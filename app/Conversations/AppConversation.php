<?php
namespace App\Conversations;
//http_response_code(200);
//fastcgi_finish_request();

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

// for main app
//use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Foundation\Validation\ValidatesRequests;
//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Traits\BCPTrait;


use App\User;
use App\settings;
//use App\account;
use App\plans;
use App\agents;
//use App\confirmations;
use App\tp_transactions;
use App\user_plans;
use App\users;
use App\deposits;
use App\wdmethods;
use App\withdrawals;
use DB;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

class AppConversation extends Conversation
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use BCPTrait;

    /**
     * Start the conversation.
     *
     * @return mixed
     */
     
    //register user and return investment plans
    protected $email;
    public function register_user($p){
        
        $this->p=$p; //clean and use
        $this->ref=substr($this->p,7);

        if(count(users::where('tele_id',$this->bot->getUser()->getId())->first())==1){
            
            $this->say('Welcome back! Below is our investment plans. Please make a choice.');
            //select plan option
            $action="new";
            $pbtns=$this->selectplan($action);
            $this->say($pbtns);
            
        }
        else{
        $this->ask('One more thing '.$this->bot->getUser()->getFirstName().', what is your email?', function(Answer $answer) {
            // collect user result
            $this->email = $answer->getText();
            $this->bot->types();
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
              $this->say('Great - that is all we need, '.$this->email);
            
            $this->bot->types();
            //save user info
            $user = new users();
            $user->tele_id=$this->bot->getUser()->getId();
            $user->name=$this->bot->getUser()->getFirstName();
            $user->email=$this->email;
            $user->ref_by=$this->ref;
            $user->save();
            
            //fetch site settings
            $settings=settings::where('id','1')->first();
            
            //process and update with ref link
            $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
            
            //$s=substr($this->bot->getUser()->getFirstName(),1,2);
            //generate random alphanumeric value for ref link
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $user_ref_id=substr(str_shuffle($permitted_chars), 0, 5);
            $this->ref_link=$settings->bot_link."?start=ref-$user_ref_id";
            
            //update
            users::where('tele_id', $this->bot->getUser()->getId())
            ->update([
            'bot_ref_link' => $this->ref_link,
            ]);
            
        //if referral parameter was sent
          if(!empty($user->ref_by) || $user->ref_by !="0"){
            //Process referral
            $ref_by_link=$settings->bot_link."?start=$user->ref_by";
            //get the referral
            $duser=users::where('bot_ref_link',$ref_by_link)->first();
            //check if the refferral already exists
          if(count(agents::where('agent',$duser->id)->first())>0){
            //update the agent info
             agents::where('agent',$duser->id)->increment('total_refered', 1);
    
          }
          else{
            //add the referral to the agents model

          $agent_id = DB::table('agents')->insertGetId(
            [
              'agent' => $duser->id,
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]
           );
          //increment refered clients by 1
          agents::where('id',$agent_id)->increment('total_refered', 1);
            }
            }
            
            $this->say('You have been registered! Below is our investment plans. Please make a choice.');

            //select plan option
            $action="new";
            $pbtns=$this->selectplan($action);
            $this->say($pbtns);
            } else {
              //$p=$this->p;
              $this->say("$this->email is not a valid email address");
              //return
            //$repeat=$this->register_user($p);
            //$repeat->say($repeat);
            }
            
        });
        }
    }

    public function selectplan($action){
            $this->action="$action";
        
            $plns=plans::where('type','Main')->get();

        foreach ($plns as $result) {
            //fetch site settings
            $settings=settings::where('id','1')->first();
            if($result->increment_type=="Percentage"){
            $roi=$result->increment_amount.'%';
            }elseif($result->increment_type=="Fixed"){
            $roi="$settings->currency$result->increment_amount";
            }
            
            //return choose plan buttons
            $question = Question::create(
            $result->name.' | Min: '
            . $settings->currency . $result->min_price . ' | Max: ' 
            . $settings->currency . $result->max_price . ' | ROI: ' 
            . $roi .' '
            . $result->increment_interval . ' For: ' 
            . $result->expiration
                )
            ->fallback('Say HELLO to get started.')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Select '.$result->name.' package')->value($result->id),
            ]);
            
            
            $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $plans=plans::where('type','Main')->get();

                foreach ($plans as $result) {
                if ($answer->getValue() == "$result->id") {
                   // if($this->action=="switch"){
                    
                    
                   // }else{
                    //get user
                    $usr=users::where('tele_id', $this->bot->getUser()->getId())->first();
                
                    $userplanid = DB::table('user_plans')->insertGetId(
                    [
                      'plan' => $result->id,
                      'user' => $usr->id,
                      'created_at' => \Carbon\Carbon::now(),
                      'updated_at' => \Carbon\Carbon::now(),
                    ]
                   );
                    
                    
                    //update the user plan with the plan ID 
                    users::where('tele_id', $this->bot->getUser()->getId())
                    ->update([
                    'plan' => $result->id,
                    'user_plan' => $userplanid,
                    ]);
                    
                    $this->say("$result->name plan selected.");
                  //  }
                    $this->account();
                    
                } 
                }
                }
            });
        }
        
    }
    
    public function account(){
        $this->say('Welcome back!');
        //fetch site settings
        $settings=settings::where('id','1')->first();
        //fetch user and get balance
        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
        
        //$this->ask("Please enter referal link", function(Answer $answer) {
            //$this->extra_param = $this->getMessage()->getText(true);
        //});
        //$this->say("Your account balance is $settings->currency$user->account_bal.");
        
        //show nav
        $nav=$this->navigation();
        $this->say($nav);
    }
    
    //withdraw funds option
    public function withdrawfunds(){
        $this->bot->types();
        //fetch site settings
        $settings=settings::where('id','1')->first();
        
        $this->ask("Please enter the amount you wish to withdraw in $settings->currency", function(Answer $answer) {
            // collect user result and validate
            if(is_numeric($answer->getText())){
              $this->amount=$answer->getText();
              $this->say("Great! I have collected your input. $this->amount. Please select a withdrawal method.");
              
              $methods=wdmethods::where('type','withdrawal')->where('status','enabled')->get();
              
              foreach ($methods as $result) {
                //fetch site settings
                $settings=settings::where('id','1')->first();
                
                //return choose plan buttons
                $question = Question::create(
                $result->name.' | Min: '
                . $settings->currency . $result->minimum . ' | Max: ' 
                . $settings->currency . $result->maximum . ' | Charges: ' 
                . $settings->currency . $result->charges_fixed .' +'
                . $result->charges_percentage.'%' . ' Duration: ' 
                . $result->duration
                    )
                ->fallback('Say HELLO to get started.')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create('Select '.$result->name.' method')->value($result->id),
                ]);
                
                
                $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $method=wdmethods::where('type','withdrawal')->where('status','enabled')->get();
    
                    foreach ($method as $result) {
                    if ($answer->getValue() == "$result->id") {
                    //fetch user balance
                    $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                    //get the method and calculate charges
                    $m=wdmethods::where('id',$result->id)->first();
                    $charges_percentage = $this->amount * $m->charges_percentage/100;
                    $to_withdraw = $this->amount + $charges_percentage + $m->charges_fixed;
                    
                    //check if user's balance >= toWithdraw + charges or method minimum
                    if($this->amount < $m->minimum){
                        $this->say("The amount is less than the minimum for this withdrawal method.");
                        //show nav
                        $nav=$this->navigation();
                        return($nav);
                    }
                    if($user->account_bal < $to_withdraw){
                        $this->say("Sorry! Your account balance is insufficient for this operation.");
                        //show nav
                        $nav=$this->navigation();
                        return($nav);
                    }
                    else{
                        //$this->say("Withdrawal request placed successful! $result->name method selected.");
                        
                        $amount=$this->amount; 
                        if($result->name=='Bitcoin'){
                    	    $coin="BTC";
                    	    //check user has selected method wallet address set
                    	    if(empty($user->btc_address)){
                    	        $updatewithdrawalinfo=$this->updatewithdrawalinfo($coin);
                                return($updatewithdrawalinfo);
                    	    }
                    	    $wallet=$user->btc_address;
                    	    
                    	}elseif($result->name=='Ethereum'){
                    	    $coin="ETH";
                    	    //check user has selected method wallet address set
                    	    if(empty($user->eth_address)){
                    	        $updatewithdrawalinfo=$this->updatewithdrawalinfo($coin);
                                return($updatewithdrawalinfo);
                    	    }
                    	    $wallet=$user->eth_address;
                    	    
                    	}elseif($result->name=='Litecoin'){
                    	    $coin="LTC";
                    	    //check user has selected method wallet address set
                    	    if(empty($user->ltc_address)){
                    	        $updatewithdrawalinfo=$this->updatewithdrawalinfo($coin);
                                return($updatewithdrawalinfo);
                    	    }
                    	     $wallet=$user->ltc_address;
                    	     
                    	}
                        $ui=$this->bot->getUser()->getId(); 
                        
                        //debit user then create transaction
                        //get user
                        $du=users::where('tele_id', $ui)->first();
                        //debit user
                        users::where('id', $du->id)
                        ->update([
                        'account_bal'=>$du->account_bal-$to_withdraw,
                        ]);
                        
                        
                        $createtxn=$this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
                        $this->say($createtxn);
                        
                        //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }
                    
                    }
                    
                    }
                    
                    }
                });
            }
              
            }
            else{
                $this->say('Please enter amount only. E.g. 200, 1000, 2500');
                $this->withdrawfunds();
            }
            
        });
    }
    
    //deposit funds option
    public function depositfunds(){
        
        //get user
        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
        //get plan
        $p=user_plans::where('id',$user->user_plan)->first();
        if($p->active=='yes'){
            $this->say("Please select a package to deposit to.");
            //return packages
            $action="switch";
            return $this->selectplan($action);
        }
        
        $this->bot->types();
        //fetch site settings
        $settings=settings::where('id','1')->first();
        
        $this->ask("Please enter the amount you wish to deposit in $settings->currency", function(Answer $answer) {
            // collect user result and validate
            if(is_numeric($answer->getText())){
              $this->amount=$answer->getText();
              
              //get user
              $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
              //get plan
              $plan=plans::where('id',$user->plan)->first();
              //fetch site settings
              $settings=settings::where('id','1')->first();
              
              if($this->amount < $plan->min_price || $this->amount > $plan->max_price){
                $this->say("This amount must be between $settings->currency$plan->min_price and $settings->currency$plan->max_price");
                $this->say($this->depositfunds());
              }
              else{
              $this->say("Great! I have collected your input. $this->amount. Please select a deposit method.");
              
              $methods=wdmethods::where('type','deposit')->where('status','enabled')->get();
              
              foreach ($methods as $result) {
                //fetch site settings
                $settings=settings::where('id','1')->first();
                
                //return choose plan buttons
                $question = Question::create($result->name)
                ->fallback('Say HELLO to get started.')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create(' '.$result->name.' ')->value($result->id),
                ]);
                
                
                $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $method=wdmethods::where('type','deposit')->where('status','enabled')->get();
    
                    foreach ($method as $result) {
                    if ($answer->getValue() == "$result->id") {
                    
                    $this->say("$result->name method selected.");
                    //get user
                    $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                    $amount=$this->amount; 
                    $up=$user->user_plan; 
                    $ui=$this->bot->getUser()->getId(); 
                    $uid=$user->id;
                    $msg="new";
                    
                    if($result->name=="Account"){
                        $dfacct=$this->deposit_from_account($amount, $up, $uid);
                        $this->say($dfacct);
                    }
                    else{
                    
                    if($result->name=='Bitcoin'){
                	    $coin="BTC";
                	}elseif($result->name=='Ethereum'){
                	    $coin="ETH";
                	}elseif($result->name=='Litecoin'){
                	    $coin="LTC";
                	}
                    
                    $createtxn=$this->paywithcp($amount, $coin, $up, $ui, $msg);
                    $this->say($createtxn);
                    
                    //fetch site settings
                    $settings=settings::where('id','1')->first();
                   
                    $this->say("Your transaction has been created successful! Please send funds to the address above. Funds will be credited to your account automatically.");
                    }
                    //show nav
                    $nav=$this->navigation();
                    $this->say($nav);
                    
                    }
                    
                    }
                    
                    }
                });
            }
            }
            }
            else{
                $this->say('Please enter amount only. E.g. 200, 1000, 2500');
                $this->depositfunds();
            }
            
        });
        
    }
    
    
    
    public function deposit_from_account($amount, $up, $uid){
                    //get user
                    $us=users::where('id',$uid)->first();
                    //get plan
                    $plan=user_plans::where('id',$up)->first();
                    $plan=plans::where('id',$plan->plan)->first();
                    
                    if($us->account_bal < $amount){
                        $this->say("Your account balance is insufficient for this plan. Please top up.");
                    }else{
                    //debit user
                    users::where('id', $uid)
                    ->update([
                    'account_bal'=>$us->account_bal-$amount,
                    //'confirmed_plan'=>$result->id,
                    ]);
                    
                    //confirm user plan
                  user_plans::where('id',$up)->where('plan',$us->plan)
                  ->update([
                  'amount' => $amount,
                  'active' => "yes",
                  'activated_at' => \Carbon\Carbon::now(),
                  'last_growth' => \Carbon\Carbon::now(),
                  ]);
                  
                   //save deposit info
                  $dp=new deposits();
                
                  $dp->amount= $amount;
                  $dp->payment_mode= 'From account';
                  $dp->status= 'processed';
                  $dp->proof= 'Account';
                  $dp->plan= $plan->id;
                  $dp->user= $uid;
                  $dp->save();
                    
                    //give % to referral
                    if(!empty($us->ref_by) || $us->ref_by !="0"){
                        //fetch site settings
                    $settings=settings::where('id','1')->first();
                    //start to Process referral
                    $ref_by_link=$settings->bot_link."?start=$us->ref_by";
                    //get the referral
                    $duser=users::where('bot_ref_link',$ref_by_link)->first();
                    
                  //increment the user's earnings
                  $earnings=$settings->referral_commission*$amount/100;
                  agents::where('agent',$duser->id)->increment('earnings', $earnings);
                  
                  
                  //Add ref earning to the users account balance
                    users::where('id', $duser->id)
                    ->update([
                    'account_bal'=>$duser->account_bal+$earnings,
                    ]);
                    
                    }
                    
                    //fetch site settings
                    $settings=settings::where('id','1')->first();
                    $this->say("$plan->name plan activated and your account has been debited $settings->currency$amount");
                    
                    }
    }
    
    public function affiliate(){
        
    //get user
    $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
    //get settings
    $settings=settings::where('id','1')->first();
    
    $this->say("Your referral link to share with your friends:");
    $this->say("$user->bot_ref_link\n\nYour referral stats:");
    $dref=agents::where('agent',$user->id)->first();
    if(count($dref)==0){
        $this->say("Total referred: 0 \n\n Referral earnings: $settings->currency 0.00");
    }else{
        $this->say("Total referred: $dref->total_refered 
         
        \n\n Referral earnings: $settings->currency$dref->earnings.");
    }
        
    }

    private function showInfo()
    {
        $param = $this->bot->getMessage()->getText(true);
        $settings=settings::where('id','1')->first();
        //Welcome
        $this->say("Welcome to $settings->site_name, $settings->description	

📁 ɴᴀᴍᴇ : $settings->site_name

🔗 WEBSITE ʟɪɴᴋ : $settings->site_address

🔗 SUPPORT: $settings->contact_email

📊 Multiple Investment ᴘlans

✅  ReInvest

        Accepted currency for deposits
               and withdraw 👇

       🥇 BITCOIN      (BTC)
       🥈 ETHEREUM (ETH)
       🥉 LITECOIN     (LTC)


✅ Instant Payment

🚸 REFERRALS COMMISSION

Payment mode for investment 👇
Bitcoin, ethereum, and litecoin🏂

🚨🚨Attention Here!🚨🚨
 📞Administrators will never message you privately!🚷 Please take that in mind! - do not response to any DUMMY telegram account pretending to be the administrator👑 of the Bot report such user to the group admin, if you need help use the support option in your bot Thank you!⚠️⚠️⚠️.
.");
        
        $this->say('welcome '. $this->bot->getUser()->getFirstName().'.   .');
        
        $this->bot->types();
        
        //show nav
        $nav=$this->navigation1($param);
        $this->say($nav);
        
    }
    
    public function navigation(){
                    
                    //Present Nav options
                    //fetch site settings
                    $settings=settings::where('id','1')->first();
                    //fect user
                     $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                     //get package
                     $plan=user_plans::where('plan',$user->plan)->where('id',$user->user_plan)->first();
                     if($plan->active == "yes"){
                         $this->plan_status="Active";
                     }else{
                         $this->plan_status="Not active";
                     }
                     $plan=plans::where('id',$user->plan)->first();
                    //prepare buttons
                    $emoticonp = "\xF0\x9F\x95\xA0";
                    $btnp =  json_decode('"'.$emoticonp.'"')." Your package(s):  $plan->name : $this->plan_status";
                    
                    $emoticon = "\xF0\x9F\x92\xB0";
                    $bal=number_format($user->account_bal, 2, '.', ',');
                    $btn =  json_decode('"'.$emoticon.'"')." View account | Balance:  $settings->currency$bal";
                    
                    $emoticon1 = "\xF0\x9F\x92\xB3";
                    $btn1 =  json_decode('"'.$emoticon1.'"')." Deposit funds";
                    
                    $emoticon2 = "\xF0\x9F\x92\xB2";
                    $btn2 =  json_decode('"'.$emoticon2.'"')." Withdraw funds ";
                    
                    $emoticon3 = "\xE2\x86\xAA";
                    $btn3 =  json_decode('"'.$emoticon3.'"')." Visit main menu ";
                    
                    $emoticon4 = "\xF0\x9F\x92\xAC";
                    $btn4 =  json_decode('"'.$emoticon4.'"')." Contact support ";
                    
                    $emoticon5 = "\xF0\x9F\x92\xB1";
                    $btn5 =  json_decode('"'.$emoticon5.'"')." Affiliate ";
                    
                    $emoticon6 = "\xF0\x9F\x92\xB9";
                    $btn6 =  json_decode('"'.$emoticon6.'"')." ReInvest ";
                    
                    
                    $keyboard = [
                        [$btnp],
                        [$btn],
                        [$btn1, $btn2],
                        [$btn5, $btn4],
                        [$btn3, $btn6],
                    ];
                $this->ask('Walk around with the options below',
                    function (Answer $answer) {
                        //$this->askAdress();
                   
                    if(strpos($answer->getText(),"Balance")!==false){
                        //account history nav
                        $this->account_history();
                    }elseif(strpos($answer->getText(),"package")!==false){
                        //fect user
                        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                        //fetch plans
                        $plans=user_plans::where('user',$user->id)->get();
                        $this->say("Your packages:");
                        foreach($plans as $plan){
                        //view packages
                        if($plan->active=="yes"){
                           $status="active"; 
                        }else{
                            $status="Not active"; 
                        }
                        $dplans=plans::where('id',$plan->plan)->first();
                        //fetch site settings
                        $settings=settings::where('id','1')->first();

                        $this->say("$dplans->name : $status.  ");
                        }
                        //sum total deposited
                        $total_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as count"))->where('user', '=', $user->id)->get();

                        foreach($total_deposited as $total_deposited){
                            //fetch site settings
                        $settings=settings::where('id','1')->first();
                        
                        $this->say("Active deposits: $settings->currency$total_deposited->count");
                        
                        }
                        //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }
                    elseif(strpos($answer->getText(),"Deposit")!==false){
                        //deposit
                        $this->depositfunds();
                    }elseif(strpos($answer->getText(),"Withdraw")!==false){
                        //withdrawal
                        $this->withdrawfunds();
                    }
                    if(strpos($answer->getText(),"main menu")!==false){
                        //main menu
                        $this->showInfo();
                    }elseif(strpos($answer->getText(),"support")!==false){
                        //fetch site settings
                        $settings=settings::where('id','1')->first();
                        $this->say("Contact us through the email address below");
                        $this->say($settings->contact_email);
                        //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }elseif(strpos($answer->getText(),"Affiliate")!==false){
                        $this->affiliate();
                        //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }elseif(strpos($answer->getText(),"ReInvest")!==false){
                        $action="switch";
                        $this->selectplan($action);
                    }
        
                    }, ['reply_markup' => json_encode([
                                'keyboard' => $keyboard,
                                'one_time_keyboard' => true,
                                'resize_keyboard' => true
                            ])]
                    );
                    
    }
    
    public function account_history(){
        
                    //Present Nav options
                    //fetch site settings
                    $settings=settings::where('id','1')->first();
                    //fect user
                     $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                  
                    $emoticoneh = "\xF0\x9F\x94\x84";
                    $btneh =  json_decode('"'.$emoticoneh.'"')." Earnings history";
                    $emoticondh = "\xF0\x9F\x95\xA4";
                    $btndh =  json_decode('"'.$emoticondh.'"')." Deposit history";
                    $emoticonwh = "\xF0\x9F\x92\xAD";
                    $btnwh =  json_decode('"'.$emoticonwh.'"')." Withdrawal history";
                    
                    $emoticons = "\xF0\x9F\x9A\xB9";
                    $btn1 =  json_decode('"'.$emoticons.'"')." My account";
                   
                    $emoticon3 = "\xE2\x86\xAA";
                    $btn3 =  json_decode('"'.$emoticon3.'"')." Visit main menu ";
                    
                    $emoticon4 = "\xF0\x9F\x94\xA7";
                    $btn4 =  json_decode('"'.$emoticon4.'"')." Settings ";
                    
                    $keyboard = [
                        [$btneh],
                        [$btndh, $btnwh],
                        [$btn1],
                        [$btn3, $btn4],
                    ];
                $this->ask('Use the options below to view your account history.',
                    function (Answer $answer) {
                        //$this->askAdress();
                   
                    if(strpos($answer->getText(),"account")!==false){
                        $this->account();
                    }
                    elseif(strpos($answer->getText(),"Deposit")!==false){
                        //get the user
                        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                        //get deposits
                        $deposits=deposits::where('user',$user->id)->orderby('id',"desc")->take(5)->get();
                        if(count($deposits)>0){
                        foreach($deposits as $deposit){
                            //fetch site settings
                            $settings=settings::where('id','1')->first();
                            //get plan
                            $plan=plans::where('id',$deposit->plan)->first();
                            $date=$deposit->created_at->toDayDateTimeString();
                            $this->say("$settings->currency$deposit->amount | $deposit->payment_mode | $deposit->status | For $plan->name plan | $date");
                        }
                        }else{
                            $this->say("You have no deposit history yet.");
                        }
                         //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                        
                    }elseif(strpos($answer->getText(),"Withdrawal")!==false){
                        //get the user
                        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                        //get withdrawals
                        $withdrawals=withdrawals::where('user',$user->id)->orderby('id',"desc")->take(5)->get();
                        if(count($withdrawals)>0){
                        foreach($withdrawals as $withdrawal){
                            //fetch site settings
                            $settings=settings::where('id','1')->first();
                            //get plan
                            //$plan=plans::where('id',$withdrawal->plan)->first();
                            $date=$withdrawal->created_at->toDayDateTimeString();
                            $this->say("$settings->currency$withdrawal->amount | $withdrawal->payment_mode | $withdrawal->status | $date");
                        }
                        }else{
                            $this->say("You have no withdrawal history yet.");
                        }
                         //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }
                    elseif(strpos($answer->getText(),"Earnings")!==false){
                        //get the user
                        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
                        //get deposits
                        $ct=tp_transactions::where('user',$user->id)->orderby('id',"desc")->take(5)->get();
                        if(count($ct)>0){
                        foreach($ct as $ctr){
                            //fetch site settings
                            $settings=settings::where('id','1')->first();
                            $date=$ctr->created_at->toDayDateTimeString();
                            $this->say("$settings->currency$ctr->amount | Earned from $ctr->plan plan. | $date");
                        }
                        }else{
                            $this->say("You have no earning history yet.");
                        }
                         //show nav
                        $nav=$this->navigation();
                        $this->say($nav);
                    }
                    elseif(strpos($answer->getText(),"main menu")!==false){
                        //main menu
                        $this->showInfo();
                    }elseif(strpos($answer->getText(),"Settings")!==false){
                        $settings=$this->settings();
                        $this->say($settings);
                        
                    }
        
                    }, ['reply_markup' => json_encode([
                                'keyboard' => $keyboard,
                                'one_time_keyboard' => true,
                                'resize_keyboard' => true
                            ])]
                    );
                    
    }
    
    public function settings(){

                    $emoticoneh = "\xF0\x9F\x94\x84";
                    $btneh =  json_decode('"'.$emoticoneh.'"')." Set BTC wallet ";
                    $emoticondh = "\xF0\x9F\x95\xA4";
                    $btndh =  json_decode('"'.$emoticondh.'"')." Set ETH wallet ";
                    $emoticonwh = "\xF0\x9F\x92\xAD";
                    $btnwh =  json_decode('"'.$emoticonwh.'"')." Set LTC wallet ";
                    
                    $emoticons = "\xF0\x9F\x9A\xB9";
                    $btn1 =  json_decode('"'.$emoticons.'"')." My account";

                    
                    $keyboard = [
                        [$btneh],
                        [$btndh, $btnwh],
                        [$btn1],
                    ];
                $this->ask('Use the options below to update your withdrawal information '.$this->bot->getUser()->getFirstName().'.',
                    function (Answer $answer) {
                        //$this->askAdress();
                   
                    if(strpos($answer->getText(),"BTC")!==false){
                        $coin="BTC";
                         
                        $set=$this->updatewithdrawalinfo($coin);
                        $this->say($set);
                    }elseif(strpos($answer->getText(),"account")!==false){
                        $this->account();
                    }
                    elseif(strpos($answer->getText(),"ETH")!==false){
                        $coin="ETH";
                         
                        $set=$this->updatewithdrawalinfo($coin);
                        $this->say($set);
                        
                    }elseif(strpos($answer->getText(),"LTC")!==false){
                        $coin="LTC";
                         
                        $set=$this->updatewithdrawalinfo($coin);
                        $this->say($set);
                    }
                    
        
                    }, ['reply_markup' => json_encode([
                                'keyboard' => $keyboard,
                                'one_time_keyboard' => true,
                                'resize_keyboard' => true
                            ])]
                    );
    }
    
    public function updatewithdrawalinfo($coin){
        $this->say("Update your withdrawal wallet address below.");
        $this->bot->types();
        $this->coin=$coin;
        $this->ask("Please enter your $this->coin address. This will enable us send your withdrawals. Ensure you input a correct address", function(Answer $answer) {
            // collect user result
            $this->waddress = $answer->getText();

            users::where('tele_id',$this->bot->getUser()->getId())
            ->update([
                ''.$this->coin.'_address' => $this->waddress,
                ]);
                
            $this->say("Your record has been updated successful!");
            
            //show nav
            $nav=$this->navigation();
            $this->say($nav);
        });
        
    }
    
    public function navigation1($param){
        
        if(!empty($param)){
            $this->param="$param";
        }
        $user=users::where('tele_id',$this->bot->getUser()->getId())->first();
        if(!empty($user) && $user->plan !=0){
            
            $emoticons = "\xF0\x9F\x9A\xB9";
            $btn1 =  json_decode('"'.$emoticons.'"')." My account";
            
        }else{
            $emoticons = "\xE2\x9C\x85";
            $btn1 =  json_decode('"'.$emoticons.'"')." I want to register";
        }
        
        $emoticon2 = "\xF0\x9F\x8E\x8C";
        $btn2 =  json_decode('"'.$emoticon2.'"')." Group Chat ";
        
        $emoticon3 = "\xE2\x86\xAA";
        $btn3 =  json_decode('"'.$emoticon3.'"')." I want to know more ";
        
        $keyboard = [
            [$btn1],
            [$btn2, $btn3],
        ];
        
        

         $this->ask('Walk around with the options below',
            function (Answer $answer) {

            if(strpos($answer->getText(),"account")!==false){
                $this->account();
                
            }elseif(strpos($answer->getText(),"register")!==false){
                
                //ask to create account first before entering plan
                    $reg_question = Question::create("We will create your investment account now.")
                    ->fallback('Say HELLO to get started.')
                    ->callbackId('no')
                    ->addButtons([
                        Button::create('Ok please do.')->value('reg'),
                        Button::create('No thanks later.')->value('no'),
                    ]);
                    return $this->ask($reg_question, function (Answer $answer) {
                    if ($answer->isInteractiveMessageReply()) {
                        if ($answer->getValue() === 'reg') {
                            $p="$this->param";
                            $this->register_user($p);
                            
                        } 
                        //if user rejects account creation
                        else{
                            $this->say('OK. We will dismiss your record now.');
                            $param="$this->param";
                            //show nav
                            $nav=$this->navigation1($param);
                            $this->say($nav);
                        }
                    }
                });
                
            }elseif(strpos($answer->getText(),"Chat")!==false){
                    //fetch site settings
                    $settings=settings::where('id','1')->first();
                    $this->say("join our group chat 👇👇👇 
                    
✅   $settings->bot_group_chat
                    
 and also our channel for latest updates 👇👇👇
                    
✅  $settings->bot_channel
                     
Contact us through the email address below 📞📞📞📞");
                    $this->say($settings->contact_email);
                    $param="$this->param";
                    //show nav
                    $nav=$this->navigation1($param);
                    $this->say($nav);
                
            }elseif(strpos($answer->getText(),"know more")!==false){
                //fetch site settings
                    $settings=settings::where('id','1')->first();
                    
                    $this->say($settings->description);
                    $param="$this->param";
                    //show nav
                    $nav=$this->navigation1($param);
                    $this->say($nav);
                
            }
             
                
            }, ['reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'one_time_keyboard' => true,
                'resize_keyboard' => true
            ])]
        );
        
    }
    
    
    public function run()
    {
    $this->say($this->showInfo());
    }
}