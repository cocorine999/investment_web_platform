<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\settings;
use App\tp_transactions;
use App\user_plans;
use App\users;
use App\plans;
use App\Mail\NewMessage;
use App\Mail\EndInvestment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command fo Send Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        
        \Log::info("Send:Email is working fine!");
        
        
        
         //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "Alain, This is to inform you that your deposit $3000 has been received and confirmed.";
        $objDemo->sender = "BillionCycle";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Deposit processed!";
        
        
                        /*$objDemo1 = new \stdClass();
                        $objDemo1->receiver_plan = "Silver";
                        $objDemo1->received_amount = "$100";
                        $objDemo1->receiver_name = "Alain";
                        $objDemo1->date = Carbon::now();
                    
                        Mail::to("corinebocog@gmail.com")->send(new EndInvestment($objDemo1));*/
                        
        Mail::bcc("corinebocog@gmail.com")->send(new NewMessage($objDemo));
        
        /*
        
        $user_plan = user_plans::where('active','yes')->where('user', 9)->get();
                  
                  $user = users::where('id', 9)->first();
                  if($user){
                        $user->update([
                            'roi' => $user->roi + $increment,
                            'account_bal' => $user->account_bal + $increment,
                        ]);
                         
                        //save to transactions history
                        $th = new tp_transactions();
                        
                        $th->plan = $dplan->name;
                        $th->user = $user->id;
                        $th->user_plan = $user->user_plan;
                        $th->amount = $increment;
                        $th->type = "ROI";
                        $th->save();
                        
                        user_plans::where('id', $plan->id)
                        ->update([
                        'last_growth' => \Carbon\Carbon::now()
                        ]);
                  }
                    users::where('id',$ref_by)->increment('ref_bonus', 10);
                    users::where('id', 9)
                    ->update([
                    'roi' => $user->roi + $increment,
                    'account_bal' => $user->account_bal + $increment,
                    ]);
                    
                    //save to transactions history
                    $th = new tp_transactions();
                    
                    $th->plan = $dplan->name;
                    $th->user = $user->id;
                    $th->amount = $increment;
                    $th->type = "ROI";
                    $th->save();
                    
                    user_plans::where('id', $plan->id)
                    ->update([
                    'last_growth' => \Carbon\Carbon::now()
                    ]);
                    
                    //send email notification
                    $objDemo = new \stdClass();
                  $objDemo->receiver_email = $user->email;
                   $objDemo->receiver_plan = $dplan->name;
                   $objDemo->received_amount = "$settings->currency$increment";
                  $objDemo->sender = $settings->site_name;
                  $objDemo->receiver_name = $user->name;
                  $objDemo->date = \Carbon\Carbon::Now();
            
                  Mail::to($user->email)->send(new DailyProfit($objDemo));
                  //}
        */
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
      
        $this->info('Send:Email Command Run successfully!');
    }
}
