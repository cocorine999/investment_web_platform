<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\User;
use App\settings;
use App\account;
use App\plans;
use App\userlogs;
use App\hisplans;
use App\agents;
use App\confirmations;
use App\users;
use App\notifications;
use App\user_plans;
//use App\dusers;
use App\mt4details;
use App\deposits;
use App\wdmethods;
use App\withdrawals;
use App\cp_transactions;
use App\tp_transactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Traits\CPTrait;

use App\Mail\NewNotification;
use App\Mail\NewMessage;
use App\Mail\DailyProfit;
use App\Mail\EndInvestment;
use App\Mail\newroi;
use App\Mail\endplan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CPTrait;

  /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
  public function dashboard(Request $request)
  {

    $settings = settings::where('id', '1')->first();

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $key = $this->generate_string($permitted_chars, 5);

    //set files key if not set
    if ($settings->files_key == NULL) {
      settings::where('id', '1')->update([
        'files_key' => 'OT_' . $key,
      ]);
    }

    //new line


    //log user out if not approved
    if (Auth::user()->status != "active") {
      $request->session()->flush();
      $request->session()->put('reged', 'yes');
      return redirect()->route('dashboard');
    } //Also log user out if web dashboard is not enabled and user is not admin

    if ($settings->site_preference == "Telegram bot only" && Auth::user()->type != "1") {
      $request->session()->flush();
      $request->session()->put('reged', 'Sorry, you can not access web dashboard.');
      return redirect()->route('dashboard');
    }

    //Check if the user is referred by someone after a successful registration
    $settings = settings::where('id', '1')->first();
    if ($request->session()->has('ref_by')) {
      $ref_by = $request->session()->get('ref_by');
      $request->session()->forget('ref_by');
    }


    //check for users without ref link and update them with it
    $usf = users::all();
    foreach ($usf as $usf) {
      //if the ref_link column is empty
      if ($usf->ref_link == '' || $usf->ref_link == null) {

        users::where('id', $usf->id)
          ->update([
            'ref_link' => $settings->site_address . 'register/' . Str::lower(Auth::user()->name . Auth::user()->name) . "&" . Auth::user()->id,
            'ref_bonus' => '0',
            'bonus_released' => '0',
          ]);
      }

      //give reg bonus if new
      if ($usf->created_at->diffInDays() < 2 && $usf->signup_bonus != "received") {
        users::where('id', $usf->id)->update([
          'bonus' => $usf->bonus + $settings->signup_bonus,
          'account_bal' => $usf->account_bal + $settings->signup_bonus,
          'signup_bonus' => "received",
        ]);
      }
    }


    //get referral earnings

    $dref = agents::where('agent', Auth::user()->id)->first();
    if (count($dref) == 0) {
      $ref_earnings = "0.00";
    } else {
      $ref_earnings = "$dref->earnings";
    }

    //count the number of plans users have purchased
    $user_plan = user_plans::where('user', Auth::user()->id)->get();

    //sum total ref earning
    if (Auth::user()->type == "0") {

      $ref_earnings =  users::where('id', Auth::user()->id)->ref_bonus;
    } else {
      $ref_earnings = users::all()->sum('ref_bonus');
    }

    //sum total deposited
    if (Auth::user()->type == "0") {
      $total_deposited =  deposits::where('user', Auth::user()->id)->where('status', 'Processed')->sum('amount');
    } else {

      $data = deposits::all()->where('status', 'Processed');

      $wdp = $data->where('updated_at', '>=', Carbon::now()->subWeeks(1)->toDateTimeString())->sum('amount');

      $mdp = $data->where('updated_at', '>=', Carbon::now()->subMonths(1)->toDateTimeString())->sum('amount');

      $total_deposited = $data->sum('amount');
    }

    //sum total withdrawals
    if (Auth::user()->type == "0") {
      $total_withdrawals =  withdrawals::where('user', Auth::user()->id)->where('status', 'Processed')->sum('amount');
    } else {

      $data = withdrawals::all()->where('status', 'Processed');

      $wwd = $data->where('updated_at', '>=', Carbon::now()->subWeeks(1)->toDateTimeString())->sum('amount');

      $mwd = $data->where('updated_at', '>=', Carbon::now()->subMonths(1)->toDateTimeString())->sum('amount');

      $total_withdrawals = $data->sum('amount');
    }


    //sum total invested
    if (Auth::user()->type == "0") {
      $user_plan_active = user_plans::where([
        ['user', '=', Auth::user()->id],
        ['active', '=', 'yes']
      ])->get();

      $total_invested = $user_plan_active->sum('amount');
    } else {
      $user_plan_active = user_plans::all()->where('active', 'yes');

      $wusp = $user_plan_active->where('activated_at', '>=', Carbon::now()->subWeeks(1)->toDateTimeString())->sum('amount');

      $musp = $user_plan_active->where('activated_at', '>=', Carbon::now()->subMonths(1)->toDateTimeString())->sum('amount');

      $new_investment = $user_plan_active->where('activated_at', '>=', Carbon::now()->subWeeks(1)->toDateTimeString());
      $total_invested = $user_plan_active->sum('amount');
    }

    if (Auth::user()->type == "0") {
      $mgain = tp_transactions::where('type', 'ROI')->where('user', Auth::user()->id)->where('created_at', '>=', Carbon::now()->subMonths(1)->toDateTimeString())->sum('amount');
      $mbonus = tp_transactions::where('type', 'Refer Bonus')->where('user', Auth::user()->id)->where('created_at', '>=', Carbon::now()->subMonths(1)->toDateTimeString())->sum('amount');
    }


    $vue = Auth::user()->type == 0 ? 'billion.dashboard.client.dashboard' : 'billion.dashboard.admin.dashboard';

    return  view($vue)
      ->with(array(
        //'earnings'=>$earnings,
        'title' => 'User panel',
        'nbre_ref'  => count(users::where('ref_by', Auth::user()->id)->get()),
        'ref_earnings' => $ref_earnings,
        'deposited' => $total_deposited,
        'total_withdrawals' => $total_withdrawals,
        'total_invested' => $total_invested,
        'user_plan' => $user_plan,
        'mgain' => $mgain,
        'mbonus' => $mbonus,
        'wusp' => $wusp,
        'musp' => $musp,
        'wwd' => $wwd,
        'mwd' => $mwd,
        'wdp' => $wdp,
        'mdp' => $mdp,
        'new_investment' => $new_investment,
        'user_plan_active' => $user_plan_active,
        'upplan' => plans::where('id', Auth::user()->promo_plan)->first(),
        'uplan' => plans::where('id', Auth::user()->plan)->first(),
        'user_plans' => plans::where('id', Auth::user()->plan)->get(),
        'last_profit' => array_random([10.12, 2.3, 5.7, 20, 80.22, 50.89, 30, 40.23, 5, 60, 89, 4, 200.76, 140, 410.34, 103.34]),
        'last_lost' => array_random([10.2, 1.99, 30, 22, 3.32, 51.03, 12.3, 30, 3, 4, 5, 6, 20, 4]),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    //}
  }

  //Skip enter account details
  public function skip_account(Request $request)
  {
    $request->session()->put('skip_account', 'skip account');
    return redirect()->route('dashboard');
  }

  //Subscription Trading
  public function subtrade(Request $request)
  {
    return view('subtrade')
      ->with(array(
        'Subscriptionfee' => $Subscriptionfee,
        'title' => 'Subscription Trade',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Subscription Trading 
  public function subpricechange(Request $request)
  {

    $setprice = settings::where('id', '1')->first();
    $monthlyfee = $setprice->monthlyfee;
    $quaterlyfee = $setprice->quaterlyfee;
    $yearlyfee = $setprice->yearlyfee;
    $Subscriptionfee;
    $request['duration'] == "";
    if ($request['duration'] == "Monthly") {
      $Subscriptionfee = $monthlyfee;
    } elseif ($request['duration'] == "Quaterly") {
      $Subscriptionfee = $quaterlyfee;
    } else {
      $Subscriptionfee = $yearlyfee;
    }

    return response()->json($Subscriptionfee);
  }

  public function msubtrade()
  {
    return view('msubtrade')
      ->with(array(
        'subscriptions' => mt4details::orderBy('id', 'desc')
          ->paginate(10),
        'title' => 'Manage Subscription',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Save MT4 details to database
  public function savemt4details(Request $request)
  {
    $mt4 = new mt4details;
    $mt4->client_id = Auth::user()->id;
    $mt4->mt4_id = $request['userid'];
    $mt4->mt4_password =  $request['pswrd'];
    $mt4->account_type = $request['acntype'];
    $mt4->currency = $request['currency'];
    $mt4->leverage = $request['leverage'];
    $mt4->server = $request['server'];
    $mt4->duration = $request['duration'];
    $mt4->save();
    return redirect()->back()
      ->with('message', 'MT4 Details Submitted Successfully, Please wait for the system to validate your credentials');
  }

  public function investment_recovery($id)
  {
    if ($id) {
      $user = users::where('id', $id)->first();
      if ($user) {
        //send investment recovery email notification
        $objDemo = new \stdClass();
        $objDemo->message = "$user->l_name $user->name, This is to inform you that you can run for a new investment.";
        $objDemo->sender = "BillionCycle";
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "Subscribe to a new plan!";

        Mail::bcc($user->email)->send(new NewMessage($objDemo));
        return redirect()->back()
          ->with('message', 'Investment recovery email  was  been successful');
      }
    }
  }

  public function transactions($id = null)
  {
    if ($id != null) {
      $type = Auth::user()->type;
      if ($type == 1) {
        $transactions = tp_transactions::latest()->where('user_plan', $id)->where('type', "ROI")->get();
      } else {
        return redirect()->back()
          ->with('message', "You don't have permission for this request");
      }
    } else {
      $transactions = Auth::user()->type == 0 ? tp_transactions::latest()->where('user', Auth::id())->get() : tp_transactions::latest()->get();
    }


    return view('billion.dashboard.transactions')
      ->with(array(
        'transactions' => $transactions,
      ));
  }

  public function logs_activities($id = null)
  {

    $filter = $id ?? Auth::id();
    $logs_activities = userlogs::where('user', $filter)->orderBy('created_at', 'Desc')->limit(20)->get();
    return view('billion.dashboard.logs_activities')
      ->with(array(
        'logs_activities' => $logs_activities,
      ));
  }

  //Return deposit route
  public function deposits()
  {
    $deposits = Auth::user()->type == 0 ? deposits::where('user', Auth::user()->id)->orderBy('created_at', 'Desc')->paginate(20) : deposits::latest()->paginate(20);
    return view('billion.dashboard.deposits')
      ->with(array(
        'title' => 'Deposits',
        'total_deposits' => count($deposits),
        'deposits' => $deposits,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Return withdrawals route
  public function withdrawals()
  {

    $withdrawals = Auth::user()->type == 0 ? withdrawals::where('user', Auth::user()->id)->orderBy('created_at', 'Desc')->paginate(20) : withdrawals::latest()->paginate(20);
    return view('billion.dashboard.withdrawals')
      ->with(array(
        'title' => 'withdrawals',
        'withdrawals' => $withdrawals,
        'settings' => settings::where('id', '=', '1')->first(),
      ));

    return view('billion.dashboard.withdrawals')->with(
      array(
        'title' => 'withdrawals',
        'withdrawals' => withdrawals::where('user', Auth::user()->id)->orderBy('created_at', 'Desc')->paginate(20),
        'settings' => settings::where('id', '=', '1')->first(),
        'wmethods' => wdmethods::where('type', 'withdrawal')
          ->where('status', 'enabled')->get(),
      )
    );
  }


  //Return search route
  public function search(Request $request)
  {
    $searchItem = $request['search_value'];
    /* if ($request['type'] == 'user') {
      $result = users::whereRaw("MATCH(l_name,name,email) AGAINST('$searchItem')")->get();
    } */

    if (isset($request['type'])) {
    }

    if (isset($request['status'])) {
    }

    if (isset($request['hasKYC'])) {
    }

    if (isset($request['hasBalance'])) {
    }

    $result = users::whereRaw("MATCH(l_name,name,email) AGAINST('$searchItem')")->get();
    if (count($result) == 0) {
      return response()->json(['data' => []], 201);
    } else {
      return response()->json($result, 200);
    }
    return  view('billion.dashboard.users')
      ->with(array(
        'title' => 'Users search result',
        'users' => $result,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


  //Return search subscription route
  public function searchsub(Request $request)
  {
    $searchItem = $request['searchItem'];
    if ($request['type'] == 'subscription') {
      $result = mt4details::whereRaw("MATCH(mt4_id,account_type,server) AGAINST('$searchItem')")->paginate(10);
    }
    return view('msubtrade')
      ->with(array(
        'title' => 'Subscription search result',
        'subscriptions' => $result,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function confirmsub($id)
  {
    //get the sub details
    $sub = mt4details::where('id', $id)->first();
    //get user
    $user = users::where('id', $sub->client_id)->first();

    if ($sub->duration == 'Monthly') {
      $end_at = \Carbon\Carbon::now()->addMonths(1)->toDateTimeString();
    } elseif ($sub->duration == 'Quaterly') {
      $end_at = \Carbon\Carbon::now()->addMonths(4)->toDateTimeString();
    } elseif ($sub->duration == 'Yearly') {
      $end_at = \Carbon\Carbon::now()->addYears(1)->toDateTimeString();
    }
    mt4details::where('id', $id)->update([
      'start_date' => \Carbon\Carbon::now(),
      'end_date' => $end_at,
    ]);

    //notify the client via email
    $objDemo = new \stdClass();
    $objDemo->message = "$user->name, This is to inform you that your trading account management
        request has been reviewed and processed. Thank you for trusting $settings->site_name";
    $objDemo->sender = "$settings->site_name";
    $objDemo->date = \Carbon\Carbon::Now();
    $objDemo->subject = "Managed Account Started!";

    Mail::bcc($user->email)->send(new NewNotification($objDemo));

    return redirect()->back()
      ->with('message', 'Subscription Sucessfully started!');
  }

  public function delsub($id)
  {
    mt4details::where('id', $id)->delete();
    return redirect()->back()
      ->with('message', 'Subscription Sucessfully Deleted');
  }

  //Return search route for deposites
  public function searchDp(Request $request)
  {
    $dp = deposits::all();
    $searchItem = $request['query'];

    $result = deposits::where('user', $searchItem)
      ->orwhere('amount', $searchItem)
      ->orwhere('payment_mode', $searchItem)
      ->orwhere('status', $searchItem)
      ->paginate(10);

    return view('mdeposits')
      ->with(array(
        'dp' => $dp,
        'title' => 'Deposits search result',
        'deposits' => $result,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


  //Return search route for Withdrawals
  public function searchWt(Request $request)
  {
    $dp = withdrawals::all();
    $searchItem = $request['wtquery'];

    $result = withdrawals::where('user', $searchItem)
      ->orwhere('amount', $searchItem)
      ->orwhere('payment_mode', $searchItem)
      ->orwhere('status', $searchItem)
      ->paginate(10);

    return view('mwithdrawals')
      ->with(array(
        'dp' => $dp,
        'title' => 'Withdrawals search result',
        'withdrawals' => $result,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function user_details($id)
  {
    $user = users::where('id', $id)->first();
    if (!$user) {
      return redirect()->back()
        ->with('message', 'User not found');
    } else {
      return view('billion.dashboard.user-details')
        ->with(array(
          'user' => $user,
          'settings' => settings::where('id', '=', '1')->first(),
        ));
    }
  }


  //Return manage users route
  public function manageusers()
  {
    return view('billion.dashboard.users')
      ->with(array(
        'title' => 'All users',
        'users' => users::latest()->get(),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Return manage withdrawals route
  public function mwithdrawals()
  {
    return view('mwithdrawals')
      ->with(array(
        'title' => 'Manage users withdrawals',
        'withdrawals' => withdrawals::orderBy('id', 'desc')
          ->paginate(10),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Return manage deposits route
  public function mdeposits()
  {
    return view('mdeposits')
      ->with(array(
        'title' => 'Manage users deposits',
        'deposits' => deposits::orderBy('id', 'desc')
          ->paginate(10),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Return agents route
  public function agents()
  {
    return view('billion.dashboard.agents')
      ->with(array(
        'title' => 'Manage agents',
        'users' => users::orderBy('id', 'desc')
          ->get(),
        'agents' => agents::all(),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Return view agent route
  public function viewagent($agent)
  {
    return view('viewagent')
      ->with(array(
        'title' => 'Agent record',
        'agent' => users::where('id', $agent)->first(),
        'ag_r' => users::where('ref_by', $agent)->get(),
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


  //verify PayPal deposits
  public function paypalverify($amount)
  {

    $user = users::where('id', Auth::user()->id)->first();

    //save and confirm the deposit
    $dp = new deposits();

    $dp->amount = $amount;
    $dp->payment_mode = "PayPal";
    $dp->status = 'Processed';
    $dp->proof = "Paypal";
    $dp->plan = "0";
    $dp->user = $user->id;
    $dp->save();


    //add funds to user's account
    users::where('id', $user->id)
      ->update([
        'account_bal' => $user->account_bal + $amount,
      ]);

    //get settings 
    $settings = settings::where('id', '=', '1')->first();
    $earnings = $settings->referral_commission * $amount / 100;

    if (!empty($user->ref_by)) {
      //increment the user's referee total clients activated by 1
      agents::where('agent', $user->ref_by)->increment('total_activated', 1);
      agents::where('agent', $user->ref_by)->increment('earnings', $earnings);

      //add earnings to agent balance
      //get agent
      $agent = users::where('id', $user->ref_by)->first();
      users::where('id', $user->ref_by)
        ->update([
          'account_bal' => $agent->account_bal + $earnings,
        ]);

      //credit commission to ancestors
      $deposit_amount = $amount;
      $array = users::all();
      $parent = $user->id;
      $this->getAncestors($array, $deposit_amount, $parent);
    }

    //send email notification
    $objDemo = new \stdClass();
    $objDemo->message = "$user->name, This is to inform you that your deposit of $settings->currency$amount has been received and confirmed.";
    $objDemo->sender = "$settings->site_name";
    $objDemo->date = \Carbon\Carbon::Now();
    $objDemo->subject = "Deposit processed!";

    Mail::bcc($user->email)->send(new NewNotification($objDemo));


    //return redirect()->route('deposits')
    //->with('message', 'Deposit Sucessful!');
  }

  //process deposits
  public function pdeposit($id)
  {

    DB::beginTransaction();

    try {

      //confirm the users plan
      $deposit = deposits::where('id', $id)->first();
      $user = users::where('id', $deposit->user)->first();
      if ($deposit->user == $user->id && $deposit->status != "Processed") {

        //add funds to user's account
        $deposit->duser->account_bal = $user->account_bal + $deposit->amount;
        $deposit->duser->update();


        //update deposits
        $deposit->status = 'Processed';
        if (!$deposit->update()) {
          DB::rollback();
        };

        //save to transactions history
        tp_transactions::create([
          'plan' => 0,
          'user' => $user->id,
          'user_plan' => 0,
          'amount' => $deposit->amount,
          'type' => "Deposit",
        ]);
        /* 
          //add funds to user's account
            users::where('id', $user->id)
              ->update([
                'account_bal' => $user->account_bal + $deposit->amount,
              ]);

            //update deposits
            deposits::where('id', $id)
              ->update([
                'status' => 'Processed',
              ]); 

            
            save to transactions history
            $th = new tp_transactions();

            $th->plan = 0;
            $th->user = $user->id;
            $th->user_plan = 0;
            $th->amount = $deposit->amount;
            $th->type = "Deposit";
            $th->save(); 
        
        */

        //save notification message to deposit user
        notifications::create([
          'user_id' => $user->id,
          'motif' => "Deposited funds",
          'message' => "Your deposit of $$deposit->amount has been received and confirmed.",
        ]);

        if (!empty($user->ref_by)) {
          if (empty($user->bonus_reference)) {

            $earnings = 10 * $deposit->amount / 100;

            //increment the user's referee total clients activated by 1
            agents::where('agent', $user->ref_by)->increment('total_activated', 1);
            agents::where('agent', $user->ref_by)->increment('earnings', $earnings);

            //add earnings to agent balance
            //get agent
            $agent = users::where('id', $user->ref_by)->first();

            //add refer bonus to referer user
            users::where('id', $user->ref_by)
              ->update([
                'account_bal' => $agent->account_bal + $earnings,
                'ref_bonus' => $agent->ref_bonus + $earnings,
              ]);

            /* users::where('id', $user->id)
              ->update([
                'bonus_reference' => 'received',
              ]);
            */
            //update user that refer bonus is already give to is sponsor
            $deposit->duser->bonus_reference = 'received';
            $deposit->duser->save();

            tp_transactions::create([
              'plan' => 0,
              'user' => $user->ref_by,
              'user_plan' => 0,
              'amount' => $earnings,
              'type' => "Refer Bonus",
            ]);

            // save refer bonus notification to user
            notifications::create([
              'user_id' => $user->ref_by,
              'motif' => "Refer Bonus",
              'message' => "You got a bonus for refer a new investor",
            ]);
          }
        }

        DB::commit();
        $settings = settings::where('id', '=', '1')->first();
        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "Hi $user->l_name $user->name, This is to inform you that your deposit of $$deposit->amount has been received and confirmed.\n Click on this link You can now purchase to a new invest plan, click on this link";
        $objDemo->receiver =  "$user->l_name $user->name";
        $objDemo->sender = "$settings->site_name";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Deposit processed!";

        Mail::bcc($user->email)->send(new NewMessage($objDemo));


        return redirect()->back()
          ->with('message', 'Action Sucessful!');
      } else {
        return redirect()->back();
      }
      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }


  //process withdrawals
  public function pwithdrawal($id)
  {

    DB::beginTransaction();

    try {

      $withdrawal = withdrawals::where('id', $id)->first();
      $user = users::where('id', $withdrawal->user)->first();
      $user_plan = user_plans::where('id', $withdrawal->user_plan)->first();


      if ($withdrawal->user == $user->id && $withdrawal->status != "Processed") {      //check Account balance
        if ($user->account_bal < $withdrawal->to_deduct) {
          return redirect()->back()->with('message', 'Sorry, Account balance is insufficient for this request.');
        }

        if ($user_plan->active == "yes") {

          if (round($user_plan->w_limit) > 0) {
            return redirect()->back()->with('message', 'Sorry, you have already made a first withdrawal for this investment. You have to wait until the end of your investment to make another withdrawal.');
          }

          if (($user->roi + $user->ref_bonus) < $withdrawal->amount) {
            return redirect()->back()->with('message', 'Your investment(s) is not due for withdrawal yet.');
          }


          //debit user
          if ($user->roi >= $withdrawal->amount) {

            $remain = $user->account_bal - $user->ref_bonus - $user->roi;
            $roi = $user->roi - $withdrawal->amount;
            if ($user->ref_bonus > 0) {
              if ($remain == 0) {
                $refbonus = $user->ref_bonus - 2;
              } else if ($remain == 1) {
                $refbonus = $user->ref_bonus - 1;
              } else {
                $refbonus = $user->ref_bonus;
              }
            } else {
              $refbonus = $user->ref_bonus;
              $remain = $user->account_bal - $user->roi;
              if ($remain == 0) {
                $roi = $roi - 2;
              } else if ($remain == 1) {
                $roi = $roi - 1;
              } else {
                $roi = $roi;
              }
            }

            users::where('id', $user->id)->update([
              'roi' =>  $roi,
              'ref_bonus' =>  $refbonus,
              'account_bal' => $user->account_bal - $withdrawal->to_deduct,
            ]);

            withdrawals::where('id', $id)
              ->update([
                'status' => 'Processed',
              ]);

            //$user_plan->increment('w_limit', 1);
            user_plans::where('id', $user_plan->id)->update([
              'w_limit' => $user_plan->w_limit + 1,
            ]);

            //save to transactions history
            $th = new tp_transactions();

            $th->plan = $user_plan->plan;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $withdrawal->amount;
            $th->type = "Withdrawal ROI";
            $th->save();

            notifications::create([
              'user_id' => $user->id,
              'motif' => "Withdrawal of profit",
              'message' => "The withdrawal has just been made from your account.",
            ]);
          } else {

            $roi = $user->roi;
            $bonus = $withdrawal->amount - $user->roi;

            $remain_bonus = $bonus;
            if ($user->ref_bonus > 0) {
              $remain = $user->account_bal - $user->ref_bonus - $user->roi;

              if ($remain == 0) {
                $remain_bonus = $remain_bonus + 2;
              } else if ($remain == 1) {
                $remain_bonus = $remain_bonus + 1;
              } else {
                $remain_bonus = $remain_bonus;
              }
            }

            users::where('id', $user->id)->update([
              'ref_bonus' => $user->ref_bonus - $remain_bonus,
              'roi' => 0,
              'account_bal' => $user->account_bal - $withdrawal->to_deduct,
            ]);

            withdrawals::where('id', $id)
              ->update([
                'status' => 'Processed',
              ]);

            //$user_plan->increment('w_limit', 1);
            user_plans::where('id', $user_plan->id)->update([
              'w_limit' => $user_plan->w_limit + 1,
            ]);
            //save to transactions history
            $th = new tp_transactions();

            $th->plan = $user_plan->plan;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $bonus;
            $th->type = "Withdrawal Refer Bonus";
            $th->save();

            $th = new tp_transactions();

            $th->plan = $user_plan->plan;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $roi;
            $th->type = "Withdrawal ROI";
            $th->save();

            notifications::create([
              'user_id' => $user->id,
              'motif' => "Withdrawal of profit",
              'message' => "The withdrawal has just been made from your account.",
            ]);

            notifications::create([
              'user_id' => $user->id,
              'motif' => "Withdrawal of sponsorship bonus",
              'message' => "The withdrawal has just been made from your account.",
            ]);
          }
        } else {
          //get amount who can withdraw
          $amount_can_withdraw = $user_plan->dplan->expected_return - withdrawals::where('user_plan', $user_plan->id)->where('user', $user->id)->where('status', 'Processed')->sum('amount');
          //return $amount_can_withdraw;
          if ($amount_can_withdraw <= 0) {
            return redirect()->back()->with('message', 'Sorry, you have already withdrawn all your earnings for this investment.');
          } elseif ($amount_can_withdraw < $withdrawal->amount) {

            if ($amount_can_withdraw + $user->ref_bonus < $withdrawal->amount) {
              return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw + $user->ref_bonus . ' for this investment.');
            } else {

              //get connectuser last investment plan
              $connectuser_last_user_plan = user_plans::where('id', $user->user_plan)->where('user', $user->id)->first();
              if (!$connectuser_last_user_plan) {
                return redirect()->back()->with("message", "Sorry, We don't see your investment plan.");
              }
              //Check available plan
              $plans_can_invest = plans::all()->where("id", '>', $user_plan->dplan->id);

              $message =  'If you want to withdraw this amount you need to updrade to one of those investment plan: ';
              foreach ($plans_can_invest as $plan_amount) {
                $message .= "$" . $plan_amount->price . ', ';
              }

              if ($connectuser_last_user_plan->id ==  $user_plan->id) {
                return redirect()->back()->with('message', 'Sorry, you can only to withdraw $' . $amount_can_withdraw . ' for this investment. ' . $message);
              }


              if ($connectuser_last_user_plan->active == 'yes') {
                if ($withdrawal->to_deduct >= $connectuser_last_user_plan->dplan->expected_return) {
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

          //debit user account
          users::where('id', $user->id)
            ->update([
              'account_bal' => $user->account_bal - $withdrawal->to_deduct,
            ]);

          if ($amount_can_withdraw < $withdrawal->amount) {
            $bonus = $user->ref_bonus - ($withdrawal->amount - $amount_can_withdraw);
            $remain = $user->account_bal - ($withdrawal->amount - $user->ref_bonus);
            if ($remain == 0) {
              $bonus = $bonus - 2;
            } else if ($remain == 1) {
              $bonus = $bonus - 1;
            } else {
              $bonus = $bonus;
            }
            users::where('id', $user->id)->update([
              'ref_bonus' =>  $bonus,
            ]);
          }


          $total_withdraw = withdrawals::where('user_plan', $user_plan->id)
            ->where('status', 'Processed')
            ->sum('amount');

          withdrawals::where('id', $id)
            ->update([
              'status' => 'Processed',
            ]);

          user_plans::where('id', $user_plan->id)->update([
            'w_limit' => $user_plan->w_limit + 1,
          ]);

          if ($withdrawal->amount + $total_withdraw <=  (($user_plan->dplan->amount * $user_plan->dplan->gift) / 100)) {
            $th = new tp_transactions();

            $th->plan = $user_plan->plan;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $withdrawal->amount;
            $th->type = "Withdrawal ROI";
            $th->save();

            notifications::create([
              'user_id' => $user->id,
              'motif' => "Withdraw Profit",
              'message' => "The withdrawal has just been made from your account.",
            ]);
          } elseif ($withdrawal->amount + $total_withdraw <= $user_plan->dplan->expected_return) {

            $remain_profit = (($user_plan->dplan->amount * $user_plan->dplan->gift) / 100) - $total_withdraw;

            if ($remain_profit > 0) {
              $th = new tp_transactions();

              $th->plan = $user_plan->plan;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $remain_profit;
              $th->type = "Withdrawal ROI";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Withdraw Profit",
                'message' => "The withdrawal has just been made from your account.",
              ]);


              if ($withdrawal->amount - $remain_profit > 0) {
                $th = new tp_transactions();

                $th->plan = $user_plan->plan;
                $th->user = $user->id;
                $th->user_plan = $user_plan->id;
                $th->amount = $withdrawal->amount - $remain_profit;
                $th->type = "Withdrawal Investment Capital";
                $th->save();

                notifications::create([
                  'user_id' => $user->id,
                  'motif' => "Withdraw Investment Capital",
                  'message' => "The withdrawal has just been made from your account.",
                ]);
              }
            } else {


              $th = new tp_transactions();

              $th->plan = $user_plan->plan;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $withdrawal->amount;
              $th->type = "Withdrawal Investment Capital";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Withdraw Investment Capital",
                'message' => "The withdrawal has just been made from your account.",
              ]);
            }
          } else {

            $remain_profit = (($user_plan->dplan->amount * $user_plan->dplan->gift) / 100) - $total_withdraw;
            $remain_capital = $user_plan->dplan->expected_return - $total_withdraw;
            $remain = $withdrawal->amount;

            if ($remain_profit > 0) {

              $remain_capital = $user_plan->dplan->expected_return - ($remain_profit + $total_withdraw);
              $remain = $withdrawal->amount - $remain_capital - $remain_profit;

              $th = new tp_transactions();

              $th->plan = $user_plan->plan;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $remain_profit;
              $th->type = "Withdrawal ROI";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Withdraw Profit",
                'message' => "The withdrawal has just been made from your account.",
              ]);

              if ($remain_capital > 0) {
                $th = new tp_transactions();

                $th->plan = $user_plan->plan;
                $th->user = $user->id;
                $th->user_plan = $user_plan->id;
                $th->amount = $remain_capital;
                $th->type = "Withdrawal Investment Capital";
                $th->save();

                notifications::create([
                  'user_id' => $user->id,
                  'motif' => "Withdraw Investment Capital",
                  'message' => "The withdrawal has just been made from your account.",
                ]);
              }

              if ($remain > 0) {
                $th = new tp_transactions();

                $th->plan = $user_plan->plan;
                $th->user = $user->id;
                $th->user_plan = $user_plan->id;
                $th->amount = $remain;
                $th->type = "Withdrawal Refer Bonus";
                $th->save();

                notifications::create([
                  'user_id' => $user->id,
                  'motif' => "Withdrawal of sponsorship bonus",
                  'message' => "The withdrawal has just been made from your account.",
                ]);
              }
            } elseif ($remain_capital > 0) {
              $remain = $withdrawal->amount - $remain_capital;
              $th = new tp_transactions();

              $th->plan = $user_plan->plan;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $remain_capital;
              $th->type = "Withdrawal Investment Capital";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Withdraw Investment Capital",
                'message' => "The withdrawal has just been made from your account.",
              ]);

              if ($remain > 0) {
                $th = new tp_transactions();

                $th->plan = $user_plan->plan;
                $th->user = $user->id;
                $th->user_plan = $user_plan->id;
                $th->amount = $remain;
                $th->type = "Withdrawal Refer Bonus";
                $th->save();

                notifications::create([
                  'user_id' => $user->id,
                  'motif' => "Withdrawal of sponsorship bonus",
                  'message' => "The withdrawal has just been made from your account.",
                ]);
              }
            } else {
              $th = new tp_transactions();

              $th->plan = $user_plan->plan;
              $th->user = $user->id;
              $th->user_plan = 0;
              $th->amount = $remain;
              $th->type = "Withdrawal Refer Bonus";
              $th->save();

              notifications::create([
                'user_id' => $user->id,
                'motif' => "Withdrawal of sponsorship bonus",
                'message' => "The withdrawal has just been made from your account.",
              ]);
            }
          }
        }

        DB::commit();

        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "This is to inform you that a successful withdrawal has just occured on your account. Amount: $$withdrawal->amount.";
        $objDemo->subject = "Successful withdrawal";
        $objDemo->date = \Carbon\Carbon::Now();

        Mail::bcc($user->email)->send(new NewMessage($objDemo));

        return redirect()->back()
          ->with('message', 'Action Sucessful!');
      } else {
        return redirect()->back();
      }
      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }


  //process withdrawals
  public function rejectwithdrawal($id)
  {

    DB::beginTransaction();

    try {

      $withdrawal = withdrawals::where('id', $id)
        ->first();
      withdrawals::where('id', $id)
        ->update([
          'status' => 'Rejected',
        ]);

      notifications::create([
        'user_id' => $withdrawal->user,
        'motif' => "Withdrawal Request Reject",
        'message' => "Your request of withdrawal was been rejected.",
      ]);

      DB::commit();

      $settings = settings::where('id', '=', '1')->first();

      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "This is to inform you that your request of withdrawal was been rejected.";
      $objDemo->sender = $settings->site_name;
      $objDemo->subject = "Withdrawal Request Reject";
      $objDemo->date = Carbon::Now();

      Mail::bcc($withdrawal->duser->email)->send(new NewMessage($objDemo));

      return redirect()->back()
        ->with('message', 'Action Sucessful!');

      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }


  //Clear user Account
  public function clearacct(Request $request, $id)
  {
    users::where('id', $id)
      ->update([
        'account_bal' => '0',
        'roi' => '0',
        'bonus' => '0',
        'ref_bonus' => '0',
      ]);
    return redirect()->route('manageusers')
      ->with('message', 'Account cleared to $0.00');
  }

  //Plans route
  public function plans($id = null)
  {

    return view('billion.dashboard.invest')
      ->with(array(
        'plans' => plans::where('type', 'Main')->where('id', '>', $id ?? 0)->orderby('created_at', 'ASC')->get(),
      ));
  }

  //Manually Add Trading History to Users Route
  public function addHistory(Request $request)
  {
    $history = tp_transactions::create([
      'user' => $request->user_id,
      'plan' => $request->plan,
      'amount' => $request->amount,
      'type' => $request->type,
    ]);
    $user = users::where('id', $request->user_id)->first();
    $user_bal = $user->account_bal;
    if (isset($request['amount']) > 0) {
      users::where('id', $request->user_id)
        ->update([
          'account_bal' => $user_bal + $request->amount,
        ]);
    }
    $user_roi = $user->roi;
    if (isset($request['type']) == "ROI") {
      users::where('id', $request->user_id)
        ->update([
          'roi' => $user_roi + $request->amount,
        ]);
    }

    return redirect()->back()
      ->with('message', 'Action Sucessful!');
  }


  //Trash Plans route
  public function trashplan($id)
  {
    //remove users from the plan before deleting
    $users = users::where('confirmed_plan', $id)->get();
    foreach ($users as $user) {
      users::where('id', $user->id)
        ->update([
          'plan' => 0,
          'confirmed_plan' => 0,
        ]);
    }
    plans::where('id', $id)->delete();
    return redirect()->back()
      ->with('message', 'Action Sucessful!');
  }

  //Update plans
  public function updateplan(Request $request)
  {

    plans::where('id', $request['id'])
      ->update([
        'name' => $request['name'],
        'price' => $request['price'],
        'min_price' => $request['min_price'],
        'max_price' => $request['max_price'],
        'minr' => $request['minr'],
        'maxr' => $request['maxr'],
        'gift' => $request['gift'],
        'expected_return' => $request['return'],
        'increment_type' => $request['t_type'],
        'increment_amount' => $request['t_amount'],
        'increment_interval' => $request['t_interval'],
        'type' => 'Main',
        'expiration' => $request['expiration'],
      ]);
    return redirect()->back()
      ->with('message', 'Action Sucessful!');
  }

  //Main Plans route
  public function mplans()
  {
    return view('mplans')
      ->with(array(
        'title' => 'Main Plans',
        'plans' => plans::where('type', 'main')->get(),
        'settings' => settings::where('id', '1')->first(),
      ));
  }

  //My Plans route
  public function myplans()
  {

    if (Auth::user()->type == "0") {
      $plans = user_plans::where('user', Auth::user()->id)->get();
      $available_balance = Auth::user()->account_bal;
      $locked_balance = (Auth::user()->roi + Auth::user()->ref_bonus) < (user_plans::where('id', Auth::user()->user_plan)->first()->amount / 2) ? Auth::user()->roi : 0;
      $monthlyfee_balance = tp_transactions::latest()->where('user', Auth::user()->id)->where('user_plan', Auth::user()->user_plan)->whereIn("type", ["ROI", "Bonus"])->where("created_at", '>=', Carbon::today()->subMonths(1))->sum('amount');
      $dailyfee_balance = tp_transactions::latest()->where('user', Auth::user()->id)->where('user_plan', Auth::user()->user_plan)->whereIn("type", ["ROI", "Bonus"])->where("created_at", '>=', Carbon::today())->sum('amount');
    } else {
      $plans = user_plans::latest()->get();
      $available_balance = users::latest()->sum('account_bal');
      $users = users::latest()->get();

      $amount = 0;
      $monthlyamount = 0;
      $dailyamount = 0;
      foreach ($users as $user) {
        $amount += ($user->roi + $user->ref_bonus) < (user_plans::where('id', $user->user_plan)->first()->amount / 2) ? $user->roi : 0;
        $monthlyamount += tp_transactions::latest()->where('user', $user->id)->where('user_plan', $user->user_plan)->whereIn("type", ["ROI", "Bonus"])->where("created_at", '>=', Carbon::today()->subMonths(1))->sum('amount');
        $dailyamount += tp_transactions::latest()->where('user', $user->id)->where('user_plan', $user->user_plan)->whereIn("type", ["ROI", "Bonus"])->where("created_at", '>=', Carbon::today())->sum('amount');
      }
      $locked_balance = $amount;
      $monthlyfee_balance = $monthlyamount;
      $dailyfee_balance = $dailyamount;
    }

    if (count($plans) < 1) {
      return redirect()->back()->with('message', 'You do not have any investment at the moment');
    }



    return view('billion.dashboard.shemes')
      ->with(array(
        'title' => 'Your packages',
        'plans' => $plans,
        'available_balance' => $available_balance,
        'locked_balance' => $locked_balance,
        'monthlyfee_balance' => $monthlyfee_balance,
        'dailyfee_balance' => $dailyfee_balance,

        'active_plans' => user_plans::where(['user' => Auth::user()->id, 'active' => 'yes'])->get(),
        'expired_plans' => user_plans::where(['user' => Auth::user()->id, 'active' => 'expired'])->get(),
        'settings' => settings::where('id', '1')->first(),
      ));
  }

  //Promo Plans route
  public function pplans()
  {
    return view('pplans')
      ->with(array(
        'title' => 'Promo Plans',
        'plans' => plans::where('type', 'promo')->get(),
        'settings' => settings::where('id', '1')->first(),
      ));
  }

  //Jon a plan
  public function joinplan(Request $request)
  {

    $this->validate($request, [
      'id' => 'required'
    ]);

    DB::beginTransaction();

    try {
      //get user

      $user = users::where('id', Auth::user()->id)->first();

      $uplan = user_plans::where('id', $user->user_plan)->where('active', "yes")->get();

      if (count($uplan) > 0) {
        if ($uplan->first()->user == $user->id) {
          return redirect()->back()->with('message', 'You can not purcharse for a new plan. You have already an investment running.');
        }
      }

      //get plan
      $plan = plans::where('id', $request['id'])->first();

      //check if the user account balance can buy this plan
      if ($user->account_bal < $plan->price) {
        //redirect to make deposit
        return redirect()->route('deposits')
          ->with('message', 'Your account is insufficient to purchase this plan. Please make a deposit.');
      }

      if ($plan->type == 'Main') {

        //save user plan
        $userplanid = DB::table('user_plans')->insertGetId([
          'plan' => $plan->id,
          'user' => $user->id,
          'amount' => $plan->price,
          'active' => 'yes',
          'inv_duration' => $plan->expiration,
          'activated_at' => Carbon::now(),
          'last_growth' => Carbon::now(),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);

        //debit user
        users::where('id', $user->id)
          ->update([
            'account_bal' => $user->account_bal - $plan->price,
            'plan' => $plan->id,
            'user_plan' => $userplanid,
            "roi" => "0",
            'entered_at' => Carbon::now(),
          ]);

        notifications::create([
          'user_id' => $user->id,
          'motif' => "Investment funds",
          'message' => "You have purchased to " . $plan->plan . " investment plan.",
        ]);

        notifications::create([
          'user_id' => 1,
          'motif' => "Investment funds",
          'message' => $user->l_name . ' ' . $user->name . " has purchased to " . $plan->plan . " investment plan.",
        ]);

        //save to transactions history
        $th = new tp_transactions();

        $th->plan = $plan->id;
        $th->user = $user->id;
        $th->user_plan = $userplanid;
        $th->amount = $plan->price;
        $th->type = "Investment Funds";
        $th->save();
      } elseif ($plan->type == 'Promo') {
        users::where('id', Auth::user()->id)
          ->update([
            'promo_plan' => $plan->id,
          ]);
      }

      DB::commit();
      return redirect()->route('myplans')
        ->with('message', 'You successfully purchased a plan and your plan is now active. You can check the details of your investment here.s');

      // all good
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }

  //Add plan requests
  public function addplan(Request $request)
  {

    $plan = new plans();

    $plan->name = $request['name'];
    //$plan->w_limit= "2";
    $plan->price = $request['price'];
    $plan->min_price = $request['price'];
    $plan->max_price =  $request['price'];
    $plan->gift = $request['name'] == "Safir" ? 150 : 100;
    $plan->minr = $plan->price / 2;
    $plan->maxr = $plan->price + (($plan->price * $plan->gift)  / 100);

    $plan->expected_return = $plan->maxr;
    $plan->increment_type = "Percentage";
    $plan->increment_interval = "Daily";
    $plan->expiration = $request['name'] == "Safir" ? 455 : $request['expiration'];
    $plan->increment_amount = (($plan->price * $plan->gift)  / 100) / $plan->expiration;
    $plan->type = 'Main';
    $plan->save();
    return redirect()->back()
      ->with('message', 'Plan created Sucessful!');
  }

  //support route
  public function support()
  {
    return view('billion.dashboard.support')
      ->with(array(
        'title' => 'Support',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function terms()
  {
    return view('billion.dashboard.terms')
      ->with(array(
        'title' => 'Projects',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function projects()
  {
    return view('billion.dashboard.projects')
      ->with(array(
        'title' => 'Projects',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function refer_users()
  {
    return view('billion.dashboard.refer-users')
      ->with(array(
        'title' => 'Refer users',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function investment()
  {
    return view('billion.dashboard.invest-form')
      ->with(array(
        'title' => 'Investment',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  public function investmentdetails($id)
  {
    $up = user_plans::where('id', $id)->first();
    if (!$up) {
      return redirect()->back()
        ->with('message', 'Plan not found!');
    }
    $transactions = tp_transactions::latest()->where('user_plan', $up->id)->get();
    return view('billion.dashboard.sheme-details')
      ->with(array(
        'title' => 'Investment Détails',
        'invest'  => $up,
        'transactions'  => $transactions,
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


  public function saveuser(Request $request)
  {

    $this->validate($request, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'Answer' => 'same:Captcha_Result',
    ]);


    $thisid = DB::table('users')->insertGetId(
      [
        'name' => $request['name'],
        'email' => $request['email'],
        'phone_number' => $request['phone'],
        'photo' => 'male.png',
        'ref_by' => Auth::user()->id,
        'password' => bcrypt($request['password']),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]
    );

    /*
       //check if the refferral already exists
          $agent=agents::where('agent',Auth::user()->id)->first();
          if(count($agent)==1){
            //update the agent info
          agents::where('id',$agent->id)->increment('total_refered', 1);
          }
          else{
            //add the referee to the agents model

          $agent_id = DB::table('agents')->insertGetId(
            [
              'agent' => Auth::user()->id,
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ]
           );
          //increment refered clients by 1
          agents::where('id',$agent_id)->increment('total_refered', 1);
            }
       */

    //assign referal link to user
    $settings = settings::where('id', '=', '1')->first();

    users::where('id', $thisid)
      ->update([
        'ref_link' => $settings->site_address . '/ref/' . $thisid,
      ]);
    return redirect()->back()
      ->with('message', 'User Registered Sucessful!');
  }

  //block user
  public function ublock($id)
  {

    users::where('id', $id)
      ->update([
        'status' => 'suspend',
      ]);
    return redirect()->route('manageusers')
      ->with('message', 'Action Sucessful!');
  }

  //unblock user
  public function unblock($id)
  {

    users::where('id', $id)
      ->update([
        'status' => 'active',
      ]);
    return redirect()->route('manageusers')
      ->with('message', 'Action Sucessful!');
  }

  //Controller self ref issue
  public function ref(Request $request, $ref_link)
  {
    $id = Str::substr($ref_link, strrpos($ref_link, '&') + 1);
    if (isset($id)) {
      //$request->session()->flush();
      $user = users::where('id', $id)->first();
      if (count($user) == 1) {
        $request->session()->put('ref_by', $user->id);
      }
      return view('auth.register')->with(array('referer' => $user->l_name . " " . $user->name, 'ref_by' => $user->id));
    }
  }

  // pay with coinpayment option
  public function cpay($amount, $coin, $ui, $msg)
  {

    return $this->paywithcp($amount, $coin, $ui, $msg);
  }

  public function autoearning()
  {

    $investments = user_plans::where('active', 'yes')->get();


    foreach ($investments as $investment) {
      $user_plan = $investment;
      // $user_plan = user_plans::where('active','yes')->where('user', 22)->first();

      $user = users::where('id', $user_plan->user)->first();
      $pack = plans::where('id', $user_plan->plan)->first();


      if ($user && $user->id == 85) {
        if ($pack) {

          if ($user_plan) {

            if ($user_plan->activated_at->diffInDays() < $user_plan->inv_duration) {


              $user->increment('roi', $pack->increment_amount);
              $user->increment('account_bal', $pack->increment_amount);

              $th = new tp_transactions();

              $th->plan = $pack->id;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $pack->increment_amount;
              $th->type = "ROI";
              $th->save();

              user_plans::where('id', $user_plan->id)
                ->update([
                  'last_growth' => Carbon::now()
                ]);


              //send email notification
              $objDemo = new \stdClass();
              $objDemo->receiver_plan = $pack->name;
              $objDemo->received_amount = "$$pack->increment_amount";
              $objDemo->receiver_name = $user->name;
              $objDemo->date = Carbon::now();

              Mail::to($user->email)->send(new DailyProfit($objDemo));

              $withdraws = withdrawals::where('user', $user->id)->where('user_plan', $user_plan->id)->where('status', 'Processed')->sum('amount');


              if ($user->roi + $user->ref_bonus + $withdraws + $user_plan->amount >= $pack->expected_return) {

                $user->increment('account_bal', $user_plan->amount);
                $profit = tp_transactions::where('user_plan', $user_plan->id)->where('user', $user->id)->where('type', 'ROI')->sum('amount');
                $bonus =  (($user_plan->amount * $user_plan->dplan->gift) / 100) - $profit;

                if ($bonus > 0) {
                  users::where('id', $user->id)
                    ->update([
                      'ref_bonus' => $user->ref_bonus - $bonus,
                    ]);
                }

                users::where('id', $user->id)
                  ->update([
                    'roi' => 0,
                  ]);

                //plan expired
                user_plans::where('id', $user_plan->id)
                  ->update([
                    'active' => "expired",
                  ]);

                //save to transactions history
                $th = new tp_transactions();

                $th->plan = $pack->id;
                $th->user = $user->id;
                $th->user_plan = $user_plan->id;
                $th->amount = $user_plan->amount;
                $th->type = "Investment capital";
                $th->save();

                if ($bonus > 0) {
                  //save to transactions history
                  $th = new tp_transactions();
                  $th->plan = $pack->id;
                  $th->user = $user->id;
                  $th->user_plan = $user_plan->id;
                  $th->amount = $bonus;
                  $th->type = "Bonus";
                  $th->save();
                }
                //send email notification
                $objDemo = new \stdClass();
                $objDemo->receiver_plan = $pack->name;
                $objDemo->received_amount = "$$user_plan->amount";
                $objDemo->receiver_name = $user->name;
                $objDemo->date = Carbon::now();

                Mail::to($user->email)->send(new EndInvestment($objDemo));
              }
            } else {


              $user->increment('roi', $pack->increment_amount);
              $user->increment('account_bal', $pack->increment_amount);
              $user->increment('account_bal', $user_plan->amount);
              users::where('id', $user->id)
                ->update([
                  'roi' => 0,
                ]);
              //plan expired
              user_plans::where('id', $user_plan->id)
                ->update([
                  'active' => "expired",
                ]);

              $th = new tp_transactions();

              $th->plan = $pack->id;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $pack->increment_amount;
              $th->type = "ROI";
              $th->save();

              //save to transactions history
              $th = new tp_transactions();

              $th->plan = $pack->id;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $user_plan->amount;
              $th->type = "Investment capital";
              $th->save();

              //send daily profit email notification
              $objDemo = new \stdClass();
              $objDemo->receiver_plan = $pack->name;
              $objDemo->received_amount = "$$pack->increment_amount";
              $objDemo->receiver_name = $user->name;
              $objDemo->date = Carbon::now();

              Mail::to($user->email)->send(new DailyProfit($objDemo));

              //send end investment email notification
              $objDemo = new \stdClass();
              $objDemo->receiver_plan = $pack->name;
              $objDemo->received_amount = "$$user_plan->amount";
              $objDemo->receiver_name = $user->name;
              $objDemo->date = Carbon::now();

              Mail::to($user->email)->send(new EndInvestment($objDemo));
            }
          }
        }
      }
    }

    return "ok";
  }

  /*   public function autoearning()
  {

    

    $user_plan = user_plans::where('active', 'yes')->where('user', 1)->first();

    $user = users::where('id', $user_plan->user)->first();
    $pack = plans::where('id', $user_plan->plan)->first();


    if ($user) {
      if ($pack) {

        if ($user_plan) {

          if ($user_plan->first()->activated_at->diffInDays() < $user_plan->inv_duration + 1) {


            $user->increment('roi', $pack->increment_amount);
            $user->increment('account_bal', $pack->increment_amount);

            $th = new tp_transactions();

            $th->plan = $pack->id;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $pack->increment_amount;
            $th->type = "ROI";
            $th->save();

            user_plans::where('id', $user_plan->id)
              ->update([
                'last_growth' => Carbon::now()
              ]);


            //send email notification
            $objDemo = new \stdClass();
            $objDemo->receiver_plan = $pack->name;
            $objDemo->received_amount = "$$pack->increment_amount";
            $objDemo->receiver_name = $user->name;
            $objDemo->date = Carbon::now();

            Mail::to($user->email)->send(new DailyProfit($objDemo));

            $montant = withdrawals::where('user', Auth::user()->id)->where('user_plan', $user_plan->id)->where('status', 'Processed')->sum('amount');


            if ($user->roi + $user->ref_bonus + $montant + $user_plan->amount >= $pack->expected_return) {

              $user->increment('account_bal', $user_plan->amount);

              //plan expired
              user_plans::where('id', $user_plan->id)
                ->update([
                  'active' => "expired",
                ]);

              //save to transactions history
              $th = new tp_transactions();

              $th->plan = $pack->id;
              $th->user = $user->id;
              $th->user_plan = $user_plan->id;
              $th->amount = $user_plan->amount;
              $th->type = "Investment capital";
              $th->save();

              //send email notification
              $objDemo = new \stdClass();
              $objDemo->receiver_plan = $pack->name;
              $objDemo->received_amount = "$$user_plan->amount";
              $objDemo->receiver_name = $user->name;
              $objDemo->date = Carbon::now();

              Mail::to($user->email)->send(new EndInvestment($objDemo));
            }
          } else {

            $user->increment('account_bal', $user_plan->amount);

            //plan expired
            user_plans::where('id', $user_plan->id)
              ->update([
                'active' => "expired",
              ]);

            //save to transactions history
            $th = new tp_transactions();

            $th->plan = $pack->id;
            $th->user = $user->id;
            $th->user_plan = $user_plan->id;
            $th->amount = $user_plan->amount;
            $th->type = "Investment capital";
            $th->save();

            //send email notification
            $objDemo = new \stdClass();
            $objDemo->receiver_plan = $pack->name;
            $objDemo->received_amount = "$$user_plan->amount";
            $objDemo->receiver_name = $user->name;
            $objDemo->date = Carbon::now();

            Mail::to($user->email)->send(new EndInvestment($objDemo));
          }
        }
      }
    }

    return "ok";
  } */


  public function autotopup()
  {

    //calculate top up earnings and
    //auto increment earnings after the increment time

    //get user plans
    $plans = user_plans::where('active', 'yes')->get();
    foreach ($plans as $plan) {
      //get plan
      $dplan = plans::where('id', $plan->plan)->first();
      //get user
      $user = users::where('id', $plan->user)->first();
      //get settings
      $settings = settings::where('id', '1')->first();

      //check if trade mode is on
      if ($settings->trade_mode == 'on') {
        //get plan xpected return
        $to_receive = $dplan->expected_return;
        //know the plan increment interval
        if ($dplan->increment_interval == "Monthly") {
          $togrow = \Carbon\Carbon::now()->subMonths(1)->toDateTimeString();
          $dtme = $plan->last_growth->diffInMonths();
        } elseif ($dplan->increment_interval == "Weekly") {
          $togrow = \Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
          $dtme = $plan->last_growth->diffInWeeks();
        } elseif ($dplan->increment_interval == "Daily") {
          $togrow = \Carbon\Carbon::now()->subDays(1)->toDateTimeString();
          $dtme = $plan->last_growth->diffInDays();
        } elseif ($dplan->increment_interval == "Hourly") {
          $togrow = \Carbon\Carbon::now()->subHours(1)->toDateTimeString();
          $dtme = $plan->last_growth->diffInHours();
        }

        //expiration
        if ($plan->inv_duration == "One week") {
          $condition = $plan->activated_at->diffInDays() < 7 && $user->trade_mode == "on";
          $condition2 = $plan->activated_at->diffInDays() >= 7;
        } elseif ($plan->inv_duration == "One month") {
          $condition = $plan->activated_at->diffInDays() < 30 && $user->trade_mode == "on";
          $condition2 = $plan->activated_at->diffInDays() >= 30;
        } elseif ($plan->inv_duration == "Three months") {
          $condition = $plan->activated_at->diffInDays() < 90 && $user->trade_mode == "on";
          $condition2 = $plan->activated_at->diffInDays() >= 90;
        } elseif ($plan->inv_duration == "Six months") {
          $condition = $plan->activated_at->diffInDays() < 180 && $user->trade_mode == "on";
          $condition2 = $plan->activated_at->diffInDays() >= 180;
        } elseif ($plan->inv_duration == "One year") {
          $condition = $plan->activated_at->diffInDays() < 360 && $user->trade_mode == "on";
          $condition2 = $plan->activated_at->diffInDays() >= 360;
        }

        //calculate increment
        if ($dplan->increment_type == "Percentage") {
          $increment = ($plan->amount * $dplan->increment_amount) / 100;
        } else {
          $increment = $dplan->increment_amount;
        }

        if ($condition) {

          if ($plan->last_growth <= $togrow) {
            $amt = intval($dtme / 1);
            /*if($amt >1){
                     
                    for($i = 1; $i <= $amt; $i++){
                        $uincrement=$increment*$amt;
                        if($i == $amt){
                        user_plans::where('id', $plan->id)
                        ->update([
                        'last_growth' => \Carbon\Carbon::now(),
                        ]);
                        }
                        
                   users::where('id', $plan->user)
                    ->update([
                    'roi' => $user->roi + $uincrement,
                    'account_bal' => $user->account_bal + $uincrement,
                    ]);
                    
                    //save to transactions history
                    $th = new tp_transactions();
                    
                    $th->plan = $dplan->name;
                    $th->user = $user->id;
                    $th->amount = $increment;
                    $th->type = "ROI";
                    $th->save();
                    
                    //send email notification
                    $objDemo = new \stdClass();
                  $objDemo->receiver_email = $user->email;
                   $objDemo->receiver_plan = $dplan->name;
                   $objDemo->received_amount = "$settings->currency$increment";
                  $objDemo->sender = $settings->site_name;
                  $objDemo->receiver_name = $user->name;
                  $objDemo->date = \Carbon\Carbon::Now();
            
                  Mail::to($user->email)->send(new newroi($objDemo));
                    
                    }
                  }
                  else{
                    
                  */
            users::where('id', $plan->user)
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
          }
        }

        //release capital
        if ($condition2) {
          users::where('id', $plan->user)
            ->update([
              'account_bal' => $user->account_bal + $plan->amount,
            ]);

          //plan expired
          user_plans::where('id', $plan->id)
            ->update([
              'active' => "expired",
            ]);

          //save to transactions history
          $th = new tp_transactions();

          $th->plan = $dplan->name;
          $th->user = $plan->user;
          $th->amount = $plan->amount;
          $th->type = "Investment capital";
          $th->save();

          //send email notification
          $objDemo = new \stdClass();
          $objDemo->receiver_email = $user->email;
          $objDemo->receiver_plan = $dplan->name;
          $objDemo->received_amount = "$settings->currency$plan->amount";
          $objDemo->sender = $settings->site_name;
          $objDemo->receiver_name = $user->name;
          $objDemo->date = \Carbon\Carbon::Now();

          Mail::to($user->email)->send(new EndInvestment($objDemo));
        }
      }
    }
    //do auto confirm payments
    return $this->cpaywithcp();
  }

  public function getRefs($array, $parent, $level = 0)
  {
    $referedMembers = '';
    $array = users::all();
    foreach ($array as $entry) {
      if ($entry->ref_by == $parent) {
        // return "$entry->id <br>";
        $referedMembers .= '- ' . $entry->name . '<br/>';
        $referedMembers .= $this->getRefs($array, $entry->id, $level + 1);

        if ($level == 1) {
          $referedMembers .= "1 <br>";
        } elseif ($level == 2) {
          $referedMembers .= "2 <br>";
        } elseif ($level == 3) {
          $referedMembers .= "3 <br>";
        } elseif ($level == 4) {
          $referedMembers .= "4 <br>";
        } elseif ($level == 5) {
          $referedMembers .= "5 <br>";
        } elseif ($level == 0) {
          $referedMembers .= "0 <br>";
        }
      }
    }
    return $referedMembers;
  }

  //Get uplines
  function getAncestors($array, $deposit_amount, $parent = 0, $level = 0)
  {
    $referedMembers = '';
    $parent = users::where('id', $parent)->first();
    foreach ($array as $entry) {

      if ($entry->id == $parent->ref_by) {
        //get settings 
        $settings = settings::where('id', '=', '1')->first();

        if ($level == 1) {
          $earnings = $settings->referral_commission1 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
              'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
        } elseif ($level == 2) {
          $earnings = $settings->referral_commission2 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
              'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
        } elseif ($level == 3) {
          $earnings = $settings->referral_commission3 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
              'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
        } elseif ($level == 4) {
          $earnings = $settings->referral_commission4 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
              'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
        } elseif ($level == 5) {
          $earnings = $settings->referral_commission5 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
              'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
        }

        if ($level == 6) {
          break;
        }

        //$referedMembers .= '- ' . $entry->name . '- Level: '. $level. '- Commission: '.$earnings.'<br/>';
        $referedMembers .= $this->getAncestors($array, $deposit_amount, $entry->id, $level + 1);
      }
    }
    return $referedMembers;
  }


  function generate_string($input, $strength = 16)
  {
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
      $random_character = $input[mt_rand(0, $input_length - 1)];
      $random_string .= $random_character;
    }

    return $random_string;
  }
}
