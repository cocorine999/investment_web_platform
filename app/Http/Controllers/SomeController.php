<?php

namespace App\Http\Controllers;

use App\settings;
use App\users;
use App\user_plans;
use App\plans;
use App\withdrawals;
use App\deposits;
use App\cp_transactions;
use App\tp_transactions;
use App\notifications;
use Carbon\Carbon;
use App\wdmethods;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;
use App\Mail\NewMessage;

class SomeController extends Controller
{
  use CPTrait;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */


  //return settings form
  public function settings(Request $request)
  {
    include 'currencies.php';
    return view('billion.dashboard.admin-setting')->with(array(
      'settings' => settings::where('id', '=', '1')->first(),
      'wmethods' => wdmethods::where('type', 'withdrawal')->get(),
      'cpd' => cp_transactions::where('id', '=', '1')->first(),
      'currencies' => $currencies,
      'title' => 'System Settings'
    ));
    //return view('settings')->with(array('settings' => settings::where('id', '=', '1')->first(),'title' =>'System Settings'));
  }


  //Add withdrawal and deposit method
  public function addwdmethod(Request $request)
  {
    $method = new wdmethods;
    $method->name = $request['name'];
    $method->minimum = $request['minimum'];
    $method->maximum = $request['maximum'];
    $method->charges_fixed = $request['charges_fixed'];
    $method->charges_percentage = $request['charges_percentage'];
    $method->duration = $request['duration'];
    $method->type = $request['type'];
    $method->status = $request['status'];
    $method->save();
    return redirect()->back()->with('message', 'Method added successful!');
  }

  //Update withdrawal and deposit method
  public function updatewdmethod(Request $request)
  {

    wdmethods::where('id', $request['id'])
      ->update([
        'name' => $request['name'],
        'minimum' => $request['minimum'],
        'maximum' => $request['maximum'],
        'charges_fixed' => $request['charges_fixed'],
        'charges_percentage' => $request['charges_percentage'],
        'duration' => $request['duration'],
        'type' => $request['type'],
        'status' => $request['status'],
      ]);
    return redirect()->back()
      ->with('message', 'Action Successful');
  }

  //Delete withdrawal and deposit method
  public function deletewdmethod($id)
  {
    wdmethods::where('id', $id)->delete();
    return redirect()->back()->with('message', 'Withdrawal method deleted successful!');
  }

  //save Setttings to DB
  public function updatesettings(Request $request)
  {

    /*if($request['payment_mode']=='BTC'){
            $currency='BTC';
          }elseif($request['payment_mode']=='ETH'){
            $currency='ETH';
          }else{
            $currency=$request['currency'];
          }*/


    settings::where('id', $request['id'])
      ->update([
        'withdrawal_option' => $request['withdrawal_option'],
        'payment_mode' => $request['payment_mode1'] . $request['payment_mode2'] .
          $request['payment_mode3'] . $request['payment_mode4'] . $request['payment_mode5'] . $request['payment_mode6'],
        'bank_name' => $request['bank_name'],
        'account_name' => $request['account_name'],
        'account_number' => $request['account_number'],
        'btc_address' => $request['btc_address'],
        'ltc_address' => $request['ltc_address'],
        'eth_address' => $request['eth_address'],
        's_s_k' => $request['s_s_k'],
        's_p_k' => $request['s_p_k'],
        'pp_ci' => $request['pp_ci'],
        'pp_cs' => $request['pp_cs'],
        'updated_by' => Auth::user()->name,
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  public function updatewebinfo(Request $request)
  {

    $sa = $request['site_address'];

    $this->validate($request, [
      'logo' => 'mimes:jpg,jpeg,png|max:500',
    ]);

    $settings = settings::where('id', '=', '1')->first();
    if (empty($request->file('logo'))) {
      $image = $settings->logo;
    } else {
      //process logo
      $img = $request->file('logo');
      $upload_dir = 'images';
      $image = $img->getClientOriginalName();
      $move = $img->move($upload_dir, $image);
    }
    settings::where('id', $request['id'])
      ->update([
        'update' => $request['update'],
        'site_name' => $request['site_name'],
        'description' => $request['description'],
        'keywords' => $request['keywords'],
        'site_title' => $request['site_title'],
        'logo' => $image,
        'tawk_to' => strip_tags($request['tawk_to']),
        'site_address' => $request['site_address'],
        'updated_by' => Auth::user()->name,
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  public function updatepreference(Request $request)
  {


    if (isset($request['trade_mode']) and $request['trade_mode'] == 'on') {
      $trade_mode = "on";
    } else {
      $trade_mode = "off";
    }

    if (isset($request['enable_2fa']) and $request['enable_2fa'] == 'yes') {
      $enable_2fa = "yes";
    } else {
      $enable_2fa = "no";
    }

    if (isset($request['enable_kyc']) and $request['enable_kyc'] == 'yes') {
      $enable_kyc = "yes";
    } else {
      $enable_kyc = "no";
    }

    if (isset($request['enable_verification']) and $request['enable_verification'] == 'true') {
      $enable_verification = "true";

      //change status column to active on users table

      $sql = DB::statement("ALTER TABLE `users` CHANGE `status` `status` VARCHAR(25) DEFAULT 'blocked'");
    } else {
      $enable_verification = "false";
      //change status column to active on users table

      $sql = DB::statement("ALTER TABLE `users` CHANGE `status` `status` VARCHAR(25) DEFAULT 'active'");
    }

    settings::where('id', $request['id'])
      ->update([
        'contact_email' => $request['contact_email'],
        'currency' => $request['currency'],
        's_currency' => $request['s_currency'],
        'site_preference' => $request['site_preference'],
        'site_colour' => $request['site_colour'],
        'updated_by' => Auth::user()->name,

        'enable_verification' => $enable_verification,
        'trade_mode' => $trade_mode,
        'enable_2fa' => $enable_2fa,
        'enable_kyc' => $enable_kyc,
        'updated_by' => Auth::user()->name,
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  public function updatebot(Request $request)
  {
    $te = $request['telegram_token'];

    if (isset($request['bot_activate']) && $request['bot_activate'] == 'true' && $request['site_preference'] == "Telegram bot only") {
      $bot_activate = "true";

      //activate bot
      // create a new cURL resource
      $ch = curl_init();

      // set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$te/setWebhook?url=$sa/botman");
      curl_setopt($ch, CURLOPT_HEADER, 0);

      // grab URL and pass it to the browser
      curl_exec($ch);

      // close cURL resource, and free up system resources
      curl_close($ch);
    } else {
      $bot_activate = "false";

      //deactivate bot
      // create a new cURL resource
      $ch = curl_init();

      // set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$te/deleteWebhook?url=$sa/botman");
      curl_setopt($ch, CURLOPT_HEADER, 0);

      // grab URL and pass it to the browser
      curl_exec($ch);

      // close cURL resource, and free up system resources
      curl_close($ch);
    }

    /*
      //check if telegram token is not set then set it
      if($settings->telegram_token==""){
          //pass telegram token to the .env file
          $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "TELEGRAM_TOKEN=", "TELEGRAM_TOKEN=$te", file_get_contents($path)
            ));
        }
        }*/

    /*    
      if(isset($request['tawk_to'])){
        $file = base_path('resources/views/livechat.blade.php');
        $fp = fopen("$file", 'w');
        $content = $request['tawk_to'];
        fwrite($fp, "$content");
        fclose($fp);
      }*/

    settings::where('id', $request['id'])
      ->update([

        'telegram_token' => $request['telegram_token'],
        'bot_activate' => $bot_activate,
        'bot_group_chat' => $request['bot_group_chat'],
        'bot_channel' => $request['bot_channel'],
        'bot_link' => $request['bot_link'],
        'updated_by' => Auth::user()->name,
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  public function updatebotswt(Request $request)
  {

    settings::where('id', $request['id'])
      ->update([

        'referral_commission' => $request['ref_commission'],
        'referral_commission1' => $request['ref_commission1'],
        'referral_commission2' => $request['ref_commission2'],
        'referral_commission3' => $request['ref_commission3'],
        'referral_commission4' => $request['ref_commission4'],
        'referral_commission5' => $request['ref_commission5'],
        'signup_bonus' => $request['signup_bonus'],

      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  //Update Subscription Fees
  public function updatesubfee(Request $request)
  {

    settings::where('id', $request['id'])
      ->update([
        'monthlyfee' => $request['monthlyfee'],
        'quaterlyfee' => $request['quaterlyfee'],
        'yearlyfee' => $request['yearlyfee'],
        'updated_by' => Auth::user()->name,
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }

  //Trading history route
  public function tradinghistory()
  {

    return view('thistory')
      ->with(array(

        't_history' => tp_transactions::where('user', Auth::user()->id)->orderBy('id', 'desc')
          ->paginate(12),
        'title' => 'Trading History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Notification route
  public function notification()
  {

    return view('billion.dashboard.notifications')
      ->with(array(
        'notifications' => notifications::where('user_id', Auth::user()->id)->orderBy('id', 'desc')
          ->get(),
        'title' => 'Notification',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function deleteNotification($id)
  {
    if ($id) {
      $notification = notifications::where('id', $id)->delete();
    }
    return redirect()->back()
      ->with('message', 'Notification was been deleted !');
  }

  public function makeNotificationHasRead($id = null)
  {
    if ($id) {
      $notification = notifications::where('id', $id)->update([
        'read' => 1,
        'read_at' => Carbon::now(),
      ]);
    } else {
      $notifications = notifications::where('read', 0)->get();
      foreach ($notifications as $notification) {
        $notification->update([
          'read' => 1,
          'read_at' => Carbon::now(),
        ]);
        $notification->save();
      }
    }

    return redirect()->back();
  }

  //Profile route
  public function account_security()
  {
    $userinfo = users::where('id', Auth::user()->id)->first();
    return view('billion.dashboard.account-setting')->with(array(
      'userinfo' => $userinfo,
      'title' => 'Profile',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
  }

  //Profile route
  public function profile()
  {
    $userinfo = users::where('id', Auth::user()->id)->first();
    return view('billion.dashboard.account-profile')->with(array(
      'userinfo' => $userinfo,
      'title' => 'Profile',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
  }


  //Updating Profile Route
  public function updateprofile(Request $request)
  {
    users::where('id', Auth::user()->id)->first()
      ->update([
        'name' => $request->firstname,
        'l_name' => $request->surname,
        'dob' => $request->dob,
        'phone_number' => $request->phone,
        'adress' => $request->address,
      ]);
    return redirect()->back()
      ->with('message', 'Account Update Sucessful!');
  }

  public function delnotif($id)
  {
    notifications::where('id', $id)->delete();
    //$notif =notifcations::where('id',$id)->delete();
    return redirect()->back()
      ->with('message', 'Message Sucessfully Deleted');
  }

  //save CoinPayments credentials to DB
  public function updatecpd(Request $request)
  {

    cp_transactions::where('id', '1')
      ->update([
        'cp_p_key' => $request['cp_p_key'],
        'cp_pv_key' => $request['cp_pv_key'],
        'cp_m_id' => $request['cp_m_id'],
        'cp_ipn_secret' => $request['cp_ipn_secret'],
        'cp_debug_email' => $request['cp_debug_email'],

      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful');
  }


  //payment route
  public function deposit_form(Request $request)
  {


    return view('billion.dashboard.deposits-form')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function withdrawal_form(Request $request)
  {

    $plans = user_plans::where('user', Auth::user()->id)->get();
    if (count($plans) < 1) {
      return redirect()->back()->with('message', 'You do not have a investment at the moment');
    }

    return view('billion.dashboard.withdrawals-form')
      ->with(array(
        'title' => 'Request withdrawal',
        'settings' => settings::where('id', '=', '1')->first(),
        'user_plans' => $plans,
        'wmethods' => wdmethods::where('type', 'withdrawal')
          ->where('status', 'enabled')->get(),
      ));
  }

  //payment route
  public function payment(Request $request)
  {

    return view('payment')
      ->with(array(
        'amount' => $request->session()->get('amount'),
        'payment_mode' => $request->session()->get('payment_mode'),
        'pay_type' => $request->session()->get('pay_type'),
        'plan_id' => $request->session()->get('plan_id'),
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //top up route
  public function topup(Request $request)
  {

    $this->validate($request, [
      'type' => 'required',
      'transaction_amount' => 'required',
    ]);

    $user = users::where('id', $request['transaction_user_id'])->first();
    if ($user) {
      $user_bal = $user->account_bal;
      $user_bonus = $user->bonus;
      $user_roi = $user->roi;
      $user_Ref = $user->ref_bonus;

      if ($request['transaction_type'] == "Credit") {
        if ($request['type'] == "Bonus") {
          users::where('id', $request['transaction_user_id'])
            ->update([
              'bonus' => $user_bonus + $request['transaction_amount'],
              'account_bal' => $user_bal + $request->transaction_amount,
            ]);

          $th = new tp_transactions();

          $th->plan = 0;
          $th->user = $user->id;
          $th->user_plan = 0;
          $th->amount = $request->transaction_amount;
          $th->type = "Bonus";
          $th->save();

          notifications::create([
            'user_id' => $user->id,
            'motif' => "Credited Bonus",
            'message' => "Your account is credited of bonus.",
          ]);
        } elseif ($request['type'] == "Profit") {

          users::where('id', $request->transaction_user_id)
            ->update([
              'roi' => $user_roi + $request->transaction_amount,
              'account_bal' => $user_bal + $request->transaction_amount,
            ]);

          $th = new tp_transactions();

          $th->plan = 0;
          $th->user = $user->id;
          $th->user_plan = 0;
          $th->amount = $request->transaction_amount;
          $th->type = "ROI";
          $th->save();

          notifications::create([
            'user_id' => $user->id,
            'motif' => "Credited Profit",
            'message' => "Your account is credited of investment profit.",
          ]);
        } elseif ($request['type'] == "Ref_Bonus") {
          users::where('id', $request->transaction_user_id)
            ->update([
              'ref_bonus' => $user_Ref + $request->transaction_amount,
              'account_bal' => $user_bal + $request->transaction_amount,
            ]);

          //save to transactions history
          $th = new tp_transactions();

          $th->plan = 0;
          $th->user = $user->id;
          $th->user_plan = 0;
          $th->amount = $request->transaction_amount;
          $th->type = "Refer Bonus";
          $th->save();

          notifications::create([
            'user_id' => $user->id,
            'motif' => "Refer Bonus",
            'message' => "You got a bonus for refer a new user",
          ]);
        }
      } elseif ($request['transaction_type'] == "Debit") {
        if ($user_bal >= $request->transaction_amount) {

          if ($request['type'] == "Bonus") {
            if ($user_bonus >= $request->transaction_amount) {
              users::where('id', $request['transaction_user_id'])
                ->update([
                  'bonus' => $user_bonus - $request->transaction_amount,
                  'account_bal' => $user_bal - $request->transaction_amount,
                ]);

              $th = new tp_transactions();

              $th->plan = 0;
              $th->user = $user->id;
              $th->user_plan = 0;
              $th->amount = $request->transaction_amount;
              $th->type = "Withdrawal Bonus";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Bonus Debited",
                'message' => "Your account is debited of bonus.",
              ]);
            } else {
              return response()->json([
                "message" => "Sorry, $user->name roi balance is insufficient for this request.!"
              ], 500);
            }
          } elseif ($request['type'] == "Profit") {

            if ($user_roi >= $request->transaction_amount) {
              users::where('id', $request['transaction_user_id'])
                ->update([
                  'roi' => $user_roi - $request->transaction_amount,
                  'account_bal' => $user_bal - $request->transaction_amount,
                ]);

              $th = new tp_transactions();

              $th->plan = 0;
              $th->user = $user->id;
              $th->user_plan = 0;
              $th->amount = $request->transaction_amount;
              $th->type = "Withdrawal ROI";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Profit Debited",
                'message' => "Your account is debited of investment profit.",
              ]);
            } else {
              return response()->json([
                "message" => "Sorry, $user->name roi balance is insufficient for this request.!"
              ], 500);
            }
          } elseif ($request['type'] == "Ref_Bonus") {

            if ($user_Ref >= $request->transaction_amount) {
              users::where('id', $request['transaction_user_id'])
                ->update([
                  'ref_bonus' => $user_Ref - $request->transaction_amount,
                  'account_bal' => $user_bal - $request->transaction_amount,
                ]);

              //save to transactions history
              $th = new tp_transactions();

              $th->plan = 0;
              $th->user = $user->id;
              $th->user_plan = 0;
              $th->amount = $request->transaction_amount;
              $th->type = "Withdrawal Refer Bonus";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Refer Bonus Balance Debited",
                'message' => "Your account is debited of refer bonus",
              ]);
            } else {
              return response()->json([
                "message" => "Sorry, $user->name refer bonus balance is insufficient for this request.!"
              ], 500);
            }
          }
        } else {
          return response()->json([
            "message" => "Sorry, $user->name account balance is insufficient for this request.!"
          ], 500);
        }
      }

      $request->session()->put('message', 'Action Successful!');
      return response()->json([
        "message" => 'Action Successful!'
      ], 200);
    } else {

      return response()->json([
        "message" => 'User not found!'
      ], 500);
    }

    return redirect()->route('manageusers')
      ->with('message', 'Action Successful!');
  }

  //Return DETAILS OF KYC route
  public function detail_kyc($id)
  {
    $user = users::where('id', $id)->first();
    if (!$user) {
      return redirect()->back()
        ->with('message', "User not found!");
    }
    return view('billion/dashboard/kyc/kyc-details')
      ->with(array(
        'title' => 'KYC',
        'user' => $user,
        'users' => users::where('id_card', '!=', NULL)
          ->where('passport', '!=', NULL)->get(),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


  //Return KYC route
  public function kyc()
  {
    return view('billion/dashboard/kyc/list-kyc')
      ->with(array(
        'title' => 'KYC',
        'users' => users::latest()->where('id_card', '!=', NULL)
          ->where('passport', '!=', NULL)->where('birth_certificate', '!=', NULL)->get(),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Save verification documents requests
  public function savevdocs(Request $request)
  {

    $this->validate($request, [
      'id' => 'mimes:jpg,jpeg,png|max:4000',
      'passport' => 'mimes:jpg,jpeg,png|max:4000',
      'birth_certificate' => 'mimes:jpg,jpeg,png|max:4000',
    ]);

    $settings = settings::where('id', '1')->first();

    //proofs
    $id = $request->file('id');
    $passport = $request->file('passport');
    $birth_certificate = $request->file('birth_certificate');
    $upload_dir = "$settings->files_key/cloud/uploads";

    $image1 = $id->getClientOriginalName();
    $move = $id->move($upload_dir, $image1);

    $image2 = $passport->getClientOriginalName();
    $move = $passport->move($upload_dir, $image2);

    $image3 = $birth_certificate->getClientOriginalName();
    $move = $birth_certificate->move($upload_dir, $image3);

    //end proofs process

    //update user
    users::where('id', Auth::user()->id)
      ->update([
        'id_card' => $image1,
        'passport' => $image2,
        'birth_certificate' => $image3,
        'account_verify' => 'Under review',
      ]);

    notifications::create([
      'user_id' => 1,
      'motif' => "Submited KYC Application",
      'message' => Auth::user()->l_name . ' ' . Auth::user()->name . " Submited KYC Application.",
    ]);

    return redirect()->route('dashboard')
      ->with('message', 'Action Sucessful! Please wait for system to validate your submission.');
  }


  //accept KYC route
  public function acceptkyc($id)
  {

    DB::beginTransaction();

    try {

      $user = users::where('id', $id)->first();
      //update user
      users::where('id', $id)
        ->update([
          'account_verify' => 'Verified',
        ]);

      notifications::create([
        'user_id' => $user->id,
        'motif' => "Submited KYC Application",
        'message' => "Submited KYC Application is confirmed. Your identity was been verified.",
      ]);


      DB::commit();

      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "This is to inform you that your identity was been verified. You can now request to withdrawal.";
      $objDemo->subject = "Submited KYC Application Confirmed";
      $objDemo->date = Carbon::Now();

      Mail::bcc($user->email)->send(new NewMessage($objDemo));

      return redirect()->back()
        ->with('message', 'Action Sucessful!');
      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }

  //accept KYC route
  public function rejectkyc($id)
  {

    DB::beginTransaction();

    try {
      $user = users::where('id', $id)->first();
      //update user
      users::where('id', $id)
        ->update([
          'account_verify' => 'Rejected',
        ]);

      notifications::create([
        'user_id' => $user->id,
        'motif' => "Submited KYC Application Reject",
        'message' => "Your identity wasn't been verified. Please Re-submitted KYC form with good documents.",
      ]);

      DB::commit();

      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "This is to inform you that your identity wasn't been verified.  Please Re-submitted KYC form with good documents.";
      $objDemo->subject = "Submited KYC Application Reject";
      $objDemo->date = \Carbon\Carbon::Now();

      Mail::bcc($user->email)->send(new NewMessage($objDemo));

      return redirect()->back()
        ->with('message', 'Action Sucessful!');
      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }



  //Return payment page
  public function deposit(Request $request)
  {
    /*
         //fetch user plan
    $dplan=plans::where('id',Auth::user()->plan)->first();
    
    if(count($dplan)<1){
        return redirect()->route('mplans')
      ->with('message', 'Please choose an investment plan first.');
    }
  
  
    if($request['amount'] != $dplan->price){
        return redirect()->back()->with('message',"The amount must be your current plan price. $dplan->price.");
    }*/

    //store payment info in session
    $request->session()->put('amount', $request['amount']);
    $request->session()->put('payment_mode', $request['payment_mode']);

    if (isset($request['pay_type'])) {
      $request->session()->put('pay_type', $request['pay_type']);
      $request->session()->put('plan_id', $request['plan_id']);
    }

    return redirect()->route('payment')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Save deposit requests
  public function savedeposit(Request $request)
  {

    $this->validate($request, [
      'proof' => 'mimes:jpg,jpeg,png|max:4000',
      'amount' => 'required',
      'payment_mode' => 'required'
    ]);

    DB::beginTransaction();

    try {
      $settings = settings::where('id', '1')->first();

      //screenshot
      $img = $request->file('proof');
      $upload_dir = "$settings->files_key/cloud/uploads";

      $image = $img->getClientOriginalName();
      $img->move($upload_dir, $image);
      //end screenshot process

      if ($request['pay_type'] == 'plandeposit') {
        //add the user to this plan for approval
        users::where('id', Auth::user()->id)
          ->update([
            'plan' => $request['plan_id'],
          ]);
        $plan = $request['plan_id'];
      } elseif ($request['pay_type'] == 'Subscription Trading') {
        $plan = "Subscription Trading";
      } else {
        $plan = Auth::user()->plan;
      }

      $dp = new deposits();

      $dp->amount = $request['amount'];
      $dp->payment_mode = $request['payment_mode'];
      $dp->status = 'Pending';
      $dp->proof = $image;
      $dp->plan = $plan;
      $dp->user = Auth::user()->id;
      $dp->save();

      $notif = notifications::create([
        'user_id' => Auth::user()->id,
        'motif' => "Deposit Order",
        'message' => "Your Deposit Order is placed",
      ]);

      $notif = notifications::create([
        'user_id' => users::where('id', 1)->first()->id,
        'motif' => "Deposit Order",
        'message' => Auth::user()->l_name . " " . Auth::user()->name . " Deposit Order is placed",
      ]);

      DB::commit();

      // Kill the session variables
      $request->session()->forget('plan_id');
      $request->session()->forget('pay_type');
      $request->session()->forget('payment_mode');
      $request->session()->forget('amount');


      return redirect()->route('deposits')
        ->with('message', 'Action Sucessful! Please wait for system to validate this transaction.');

      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }

  //Save withdrawal requests
  public function withdrawal(Request $request)
  {

    $this->validate($request, [
      'amount' => 'required',
      'deposit_address' => 'required',
      'method_id' => 'required',
      'user_plan' => 'required',
    ]);


    DB::beginTransaction();

    try {

      $payment_mode = wdmethods::where('id', $request['method_id'])->first()->name;

      $to_withdraw = $request['amount'] + 2;
      //return if amount is lesser than method minimum withdrawal amount

      $connectuser = Auth::user();

      if ($connectuser->account_bal < $to_withdraw) {
        return redirect()->back()->with('message', 'Sorry, your account balance is insufficient for this request.');
      }

      if ($request['amount'] < 2) {
        return redirect()->back()->with("message", "Sorry, The minimum amount is $2.");
      }
      //get investment package of withdraw

      $withdraw_user_plan = user_plans::where('id', $request['user_plan'])->where('user', $connectuser->id)->get();

      if (count($withdraw_user_plan) == 0) {
        return redirect()->back()->with("message", "Sorry, We don't see your investment plan.");
      } elseif (count($withdraw_user_plan) > 1) {
        return redirect()->back()->with("message", "Sorry, We don't see your investment plan.");
      } else {

        $withdraw_user_plan = $withdraw_user_plan->first();

        if ($withdraw_user_plan) {
          if ($withdraw_user_plan->active == "yes") {
            if (round($withdraw_user_plan->w_limit) > 0) {
              return redirect()->back()->with('message', 'Sorry, you have already made a first withdrawal for this investment. You have to wait until the end of your investment to make another withdrawal.');
            } else if (($connectuser->roi + $connectuser->ref_bonus) < $request['amount']) {
              if (($withdraw_user_plan->inv_duration / 2) > $withdraw_user_plan->activated_at->diffInDays()) {
                return redirect()->back()->with('message', 'Your investment(s) is not due for withdrawal yet. You must wait till ' . ($withdraw_user_plan->inv_duration / 2) . ' days after your purchase investment.');
              } else {
                return redirect()->back()->with('message', 'Your investment(s) is not due for withdrawal yet.');
              }
            }

            if (($connectuser->roi + $connectuser->ref_bonus) >= ($withdraw_user_plan->amount / 2)) {
              $can_withdraw = (($withdraw_user_plan->amount * $withdraw_user_plan->dplan->gift) / 100);
              if ($request['amount'] > $can_withdraw) {
                return redirect()->back()->with('message', 'Sorry, you can only take your profits from this investment. Amount that amounts to $' . $can_withdraw);
              }
            } else {
              return redirect()->back()->with('message', 'Your investment cannot be withdrawn yet. You must have a minimum of $' . ($withdraw_user_plan->amount / 2) . ' in profit on this investment before making your first withdrawal.');
            }
          } else {
            //get amount who can withdraw
            $amount_can_withdraw = $withdraw_user_plan->dplan->expected_return - withdrawals::where('user_plan', $withdraw_user_plan->id)->where('user', $connectuser->id)->where('status', 'Processed')->sum('amount');

            if ($amount_can_withdraw <= 0) {
              return redirect()->back()->with('message', 'Sorry, you have already withdrawn all your earnings for this investment.');
            } elseif ($amount_can_withdraw < $request['amount']) {
              if ($amount_can_withdraw + $connectuser->ref_bonus < $request['amount']) {
                return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw . ' for this investment.');
              }

              //get connectuser last investment plan
              $connectuser_last_user_plan = user_plans::where('id', $connectuser->user_plan)->where('user', $connectuser->id)->first();

              //Check available plan
              $plans_can_invest = plans::all()->where("id", '>', $withdraw_user_plan->dplan->id);

              $message =  'If you want to withdraw this amount you need to updrade to one of those investment plan: ';
              foreach ($plans_can_invest as $plan_amount) {
                $message .= "$" . $plan_amount->price . ', ';
              }

              if ($connectuser_last_user_plan->id ==  $withdraw_user_plan->id) {
                return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw . ' for this investment. ' . $message);
              }

              if ($connectuser_last_user_plan->active == 'yes') {
                if ($request['amount'] > $connectuser_last_user_plan->dplan->expected_return) {
                  if ($amount_can_withdraw > $connectuser_last_user_plan->dplan->expected_return) {
                    return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw . '. ' . $message);
                  } else {
                    return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $connectuser_last_user_plan->dplan->expected_return . '. ' . $message);
                  }
                }
              } else {
                return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw . '. ' . $message);
              }
            }
          }
        } else {
          return redirect()->back()->with("message", "Sorry, We don't see your investment plan.");
        }
      }

      //get settings
      $settings = settings::where('id', '1')->first();

      if ($settings->enable_kyc == "yes") {
        if (Auth::user()->account_verify != "Verified") {
          return redirect()->route('welcome.kyc')->with('message', 'Your account must be verified before you can make withdrawal.');
        }
      }
      //save withdrawal info
      $withdrawal = new withdrawals();

      //$withdrawal->txn_id= $txn_id;         
      $withdrawal->amount = $request['amount'];
      $withdrawal->to_deduct = $to_withdraw;
      $withdrawal->user_plan = $withdraw_user_plan->id;
      $withdrawal->payment_mode = $payment_mode;
      $withdrawal->status = 'Pending';
      $withdrawal->user = $connectuser->id;
      $withdrawal->deposit_address = $request['deposit_address'];

      $withdrawal->save();

      notifications::create([
        'user_id' => $connectuser->id,
        'motif' => "Withdrawal Request",
        'message' => "You have requested to Widthdrawal",
      ]);

      notifications::create([
        'user_id' => users::where('id', 1)->first()->id,
        'motif' => "Withdrawal Request",
        'message' => $connectuser->l_name . " " . $connectuser->name . " requested to widthdrawl.",
      ]);
      DB::commit();

      return redirect()->route('withdrawalsdeposits')->with('message', 'Action Sucessful! Please wait for system to process your request.');

      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }
}
