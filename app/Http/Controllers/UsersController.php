<?php

namespace App\Http\Controllers;

use App\agents;
use App\User;
use App\users;
use App\settings;
use Illuminate\Support\Str;
use App\confirmations;
use App\gh;
use App\ph;
use App\plans;
use App\user_plans;
use App\account;
use App\deposits;
use App\withdrawals;
use App\notifications;
use App\tp_transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Mail\NewRegistration;
use App\Mail\NewNotification;
use App\userlogs;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

  public function sendmail(Request $request)
  {

    $this->validate($request, [
      'mail_content' => 'required',
      'mail_subject' => 'required',
    ]);

    $settings = settings::where('id', '=', '1')->first();

    //send email notification
    $objDemo = new \stdClass();
    $objDemo->message = $request['mail_content'];
    $objDemo->sender = $settings->site_name;
    $objDemo->date = \Carbon\Carbon::Now();
    $objDemo->subject = $request['mail_subject'];

    return collect($request->mail_to);
    if (in_array(null, $request['mail_to'])) {
      Mail::to(users::all())->send(new NewMessage($objDemo));
    } else {

      /* foreach ($request->mail_to as $userid) {

        array_push($arr,$userid);
      }
      return collect($arr); */

      foreach (collect($request->mail_to) as $userid) {
        //send email notification
        $mail_to_user = users::where('id', $userid)->first();

        Mail::to($mail_to_user->email)->send(new NewMessage($objDemo));

        notifications::create([
          'user_id' => $mail_to_user->id,
          'motif' => $request['mail_subject'],
          'message' => $request->mail_content,
        ]);
      }
    }

    /* if (isset($request['mail_to'])) {

      $notif = notifications::create([
        'user_id' => $request->mail_to,
        'motif' => $request['mail_subject'],
        'message' => $request->mail_content,
      ]);

      //send email notification
      $mail_to_user = users::where('id', $request->mail_to)->first();

      Mail::to($mail_to_user->email)->send(new NewMessage($objDemo));
    } else {
      Mail::to(users::all())->send(new NewMessage($objDemo));
    } */
    return redirect()->back()->with('message', 'Your message was sent successful!');
  }

  //Send mail to one user
  public function sendmailtooneuser(Request $request)
  {
    $settings = settings::where('id', '=', '1')->first();
    $notif = notifications::create([
      'user_id' => $request->user_id,
      'message' => $request->message,
    ]);

    //send email notification
    $mailduser = users::where('id', $request->user_id)->first();
    $objDemo = new \stdClass();
    $objDemo->message = $request['message'];
    $objDemo->sender = $settings->site_name;
    $objDemo->date = Carbon::now();
    $objDemo->subject = "$settings->site_name Notification";

    Mail::bcc($mailduser->email)->send(new NewNotification($objDemo));
    return redirect()->back()->with('message', 'Your message was sent successful!');
  }

  public function details_project($id)
  {

    //Daily profit gainers
    $d = Carbon::now()->subDays(1)->toDateTimeString();
    $dpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $d)->get();

    //Weekly profit gainers
    $w = Carbon::now()->subWeeks(1)->toDateTimeString();
    $wpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $w)->get();

    //sum total deposited
    $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();

    //sum total withdrawals
    $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();

    $settings = settings::where('id', '=', '1')->first();
    return view('home.details-project')->with(array(
      'title' => "Real Estate",
      'settings' => $settings,
      'mplans' => plans::where('type', 'Main')->get(),
      'pplans' => plans::where('type', 'Promo')->get(),
    ));
  }

  public function welcome()
  {

    //Daily profit gainers
    $d = \Carbon\Carbon::now()->subDays(1)->toDateTimeString();
    $dpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $d)->get();

    //Weekly profit gainers
    $w = \Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
    $wpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $w)->get();

    //sum total deposited
    $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();

    //sum total withdrawals
    $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();

    $settings = settings::where('id', '=', '1')->first();
    return view('home.welcome')->with(array(
      'settings' => $settings,
      'total_users' => users::count(),
      'plans' => plans::all(),
      'total_deposits' => $total_deposits,
      'total_withdrawals' => $total_withdrawals,
      'dpgs' => $dpgs,
      'wpgs' => $wpgs,
      'withdrawals' => withdrawals::orderby('id', 'DESC')->take(7)->get(),
      'deposits' => deposits::orderby('id', 'DESC')->take(7)->get(),
      'title' => $settings->site_title,
      'mplans' => plans::where('type', 'Main')->get(),
      'pplans' => plans::where('type', 'Promo')->get(),
    ));
  }
  public function index()
  {

    //Daily profit gainers
    $d = \Carbon\Carbon::now()->subDays(1)->toDateTimeString();
    $dpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $d)->get();

    //Weekly profit gainers
    $w = \Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
    $wpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $w)->get();


    //Monthly profit gainers
    $w = \Carbon\Carbon::now()->subMonths(1)->toDateTimeString();
    $mpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->where('created_at', $w)->get();

    //sum total deposited
    $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();

    //sum total withdrawals
    if (Auth::user()->type = 0) {
      $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->where('user', Auth::user()->id)->get();
    } else {

      $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->where('status', 'Processed')->get();
    }

    $settings = settings::where('id', '=', '1')->first();
    return view('home.welcome')->with(array(
      'settings' => $settings,
      'total_users' => users::count(),
      'plans' => plans::all(),
      'total_deposits' => $total_deposits,
      'total_withdrawals' => $total_withdrawals,
      'dpgs' => $dpgs,
      'wpgs' => $wpgs,
      'mpgs' => $mpgs,
      'withdrawals' => withdrawals::orderby('id', 'DESC')->take(7)->get(),
      'deposits' => deposits::orderby('id', 'DESC')->take(7)->get(),
      'title' => $settings->site_title,
      'mplans' => plans::where('type', 'Main')->get(),
      'pplans' => plans::where('type', 'Promo')->get(),
    ));
  }

  //Licensing and registration route
  public function licensing()
  {

    return view('home.licensing')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'Licensing, regulation and registration',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Terms of service route
  public function terms()
  {

    return view('home.terms')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'Terms of Service',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Privacy policy route
  public function privacy()
  {

    return view('home.privacy')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'Privacy Policy',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //FAQ route
  public function faq()
  {

    return view('home.faq')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'FAQs',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //about route
  public function about()
  {

    return view('home.about')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'About',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //Contact route
  public function contact()
  {

    return view('home.contact')
      ->with(array(
        'mplans' => plans::where('type', 'Main')->get(),
        'pplans' => plans::where('type', 'Promo')->get(),
        'amount1' => array_random([4543.12, 245.3, 955.75, 2540, 860.22, 5570.89, 370, 4230.23, 587, 60, 89, 432, 200.76, 140, 410.34, 103.34]),
        'amount2' => array_random([10.12, 99.234, 15357.75, 230, 8670.22, 5200.89, 3540, 450.23, 5, 60, 809, 4654, 2050.76, 11340, 410.34, 103.34]),
        'amount3' => array_random([1075.312, 2764.3, 509.7, 2450, 850.22, 650.89, 1340, 4230.23, 5, 460, 897, 4987, 2043.76, 15440, 410.34, 14303.34]),
        'name1' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name2' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'name3' => array_random(['Marc Smith', 'Marco Verratti', 'Emilia Bella', 'Antonio Conte', 'Lina Marzouki', 'Micheal Cyan ', 'Jane Morison', 'Williams Blake', 'James Miller', 'Mark Spencer', 'Jack Dr', 'Victor Oris']),
        'country1' => array_random(['Netherland', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country2' => array_random(['Spain', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'country3' => array_random(['Isreal', 'Italy', 'Germany', 'United states', 'London', 'Egypt ', 'South Africa', 'Mexico', 'Brazil', 'Chad', 'India', 'Canada']),
        'title' => 'Contact',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }

  //send contact message to admin email
  public function sendcontact(Request $request)
  {

    $settings = settings::where('id', '1')->first();

    $to = $settings->contact_email;
    $subject = "Contact message from " . $settings->site_name;
    $msg = substr(wordwrap($request['message'], 70), 0, 350);
    $headers = "From: " . $request['name'] . ": " . $request['email'] . "\r\n";
    //send email
    mail($to, $subject, $msg, $headers);

    return redirect()->back()
      ->with('message', ' Your message was sent successfully!');
  }

  //update Profile photo to DB
  public function updatephoto(Request $request)
  {

    $this->validate($request, [
      'photo' => 'mimes:jpg,jpeg,png|max:5000',
    ]);

    //photo
    $img = $request->file('photo');
    $upload_dir = 'images';

    $image = $img->getClientOriginalName();
    $move = $img->move($upload_dir, $image);
    users::where('id', $request['id'])
      ->update([
        'photo' => $image,
      ]);
    return redirect()->back()
      ->with('message', 'Photo Updated Sucessful');
  }

  //update users info
  public function edituser(Request $request)
  {

    users::where('id', $request['user_id'])
      ->update([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone_number' => $request['phone'],
        'ref_link' => $request['ref_link'],
      ]);
    return redirect()->back()
      ->with('message', 'User updated Successful!');
  }

  //return add account form
  public function accountdetails(Request $request)
  {
    return view('billion.dashboard.account-billing')->with(array(
      'title' => 'Update account details',
      'settings' => settings::where('id', '=', '1')->first()
    ));
  }
  //update account and contact info
  public function updateacct(Request $request)
  {

    users::where('id', $request['id'])
      ->update([
        'bank_name' => $request['bank_name'],
        'account_name' => $request['account_name'],
        'account_no' => $request['account_number'],
        'btc_address' => $request['btc_address'],
        'eth_address' => $request['eth_address'],
        'ltc_address' => $request['ltc_address'],
      ]);
    return redirect()->back()
      ->with('message', 'User updated Sucessful');
  }

  //return add change password form
  public function changepassword(Request $request)
  {
    return view('changepassword')->with(array('title' => 'Change Password', 'settings' => settings::where('id', '=', '1')->first()));
  }

  //Update Password
  public function updatepass(Request $request)
  {
    if (!password_verify($request['old_password'], $request['current_password'])) {
      return redirect()->back()
        ->with('message', 'Incorrect Old Password');
    }
    $this->validate($request, [
      'password_confirmation' => 'same:password',
      'password' => 'min:6',
    ]);

    users::where('id', $request['id'])
      ->update([
        'password' => bcrypt($request['password']),
      ]);

    notifications::create([
      'user_id' => users::where('id', $request['id'])->first()->id,
      'motif' => "Password Updated",
      'message' => "You have sucessfully updated your password",
    ]);

    return redirect()->back()
      ->with('message', 'Password Updated Sucessful');
  }

  //Reset Password
  public function resetpswd(Request $request, $id)
  {
    DB::beginTransaction();

    try {
      $password = str_random(10);
      $user = users::where('id', $id)->first();
      $user->token_2fa_expiry = null;
      $user->password = bcrypt($password);
      $user->nom = "password";
      $user->save();

      notifications::create([
        'user_id' => $user->id,
        'motif' => "Reset Password",
        'message' => "Your account password was reset by administrator",
      ]);

      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "$user->name, This is to inform you that your account password is reset by administration. \n This is your new authentification password: \n Password : $password.";
      $objDemo->date = \Carbon\Carbon::Now();
      $objDemo->subject = "Reset Password!";

      Mail::bcc($user->email)->send(new NewMessage($objDemo));

      DB::commit();

      return redirect()->route('manageusers')
        ->with('message', 'Password has been reset to default');
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }

  //Reset Password
  public function reset2fa(Request $request, $id)
  {
    DB::beginTransaction();

    try {
      $password = str_random(10);
      $user = users::where('id', $id)->first();
      $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(config('session.lifetime'));
      $user->enable_2fa = 1;

      notifications::create([
        'user_id' => $user->id,
        'motif' => "Account Security",
        'message' => "Your account 2 Factor Auth security was been enable by administration.",
      ]);

      DB::commit();

      $settings = settings::where('id', '=', '1')->first();
      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "$user->name, We secure your account with 2FA security.";
      $objDemo->sender = "$settings->site_name";
      $objDemo->date = \Carbon\Carbon::Now();
      $objDemo->subject = "Account Security!";

      Mail::bcc($user->email)->send(new NewMessage($objDemo));

      return redirect()->route('manageusers')
        ->with('message', '2 Factor Auth has been reset to default');
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back()
        ->with('message', $e->getMessage());
    }
  }

  //Access users account
  public function switchuser(Request $request, $id)
  {
    $user = users::where('id', $id)->first();

    $settings = settings::where("id", "1")->first();
    if ($settings->site_preference == "Telegram bot only") {
      //return
      return redirect()->back()->with("message", "User dashboard is disabled, switch from telegram bot and try again.");
    }

    //Byeppass 2FA
    $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(15)->toDateTimeString();
    $user->save();
    Auth::loginUsingId($user->id, true);

    return redirect()->route('dashboard')
      ->with('message', "You are logged in as $user->name !");
  }

  //activate account route
  public function activate_account($session)
  {

    $user = users::where('act_session', $session)->first();
    if ($user->act_session == $session) {
      users::where('id', $user->id)
        ->update([
          'status' => "active",
        ]);
      notifications::create([
        'user_id' => 1,
        'motif' => "New Registered",
        'message' => "A new user has just registered.",
      ]);


      notifications::create([
        'user_id' => $user->id,
        'motif' => "Welcome",
        'message' => "Welcome $user->l_name into our investment platform.",
      ]);

      return redirect('login');

      //display a msg
      echo '<link href="' . asset('css/bootstrap.css') . '" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="' . asset('js/bootstrap.min.js') . '"></script>';
      return ('<div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>Your account has been successfully verified! You may proceed to login.</h1>
    </div>');
    } else {
      //display a msg
      echo '<link href="' . asset('css/bootstrap.css') . '" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="' . asset('js/bootstrap.min.js') . '"></script>';
      return ('<div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>Details mismatched! Try registration again.</h1>
    </div>');
    }
  }

  //Delete deposit
  public function deldeposit(Request $request, $id)
  {
    if (Auth::user()->type == '0') {

      deposits::where('id', $id)->where("status", 'Pending')->delete();
    } else {
      deposits::where('id', $id)->delete();
    }
    return redirect()->back()
      ->with('message', 'Deposit history has been deleted!');
  }

  //Delete deposit
  public function delwithdrawal(Request $request, $id)
  {
    withdrawals::where('id', $id)->where("status", 'Pending')->delete();
    return redirect()->back()
      ->with('message', 'Withdrawals history has been deleted!');
  }
  //Turn on/off user trade
  public function usertrademode(Request $request, $id, $action)
  {
    if ($action == "on") {
      $action = "on";
    } elseif ($action == "off") {
      $action = "off";
    } else {
      return redirect() - back()->with('message', "Unknown action!");
    }

    users::where('id', $id)
      ->update([
        'trade_mode' => $action,
      ]);
    return redirect()->back()
      ->with('message', "User trade mode has been turned $action.");
  }

  //Make or remove admin
  public function makeadmin(Request $request, $id, $action)
  {
    if ($action == "on") {
      $action = "1";
    } elseif ($action == "off") {
      $action = "0";
    } else {
      return redirect() - back()->with('message', "Unknown action!");
    }

    users::where('id', $id)
      ->update([
        'type' => $action,
      ]);
    return redirect()->back()
      ->with('message', "User type has been changed successful!.");
  }

  //Change user email
  public function chngemail(Request $request)
  {
    $user = users::where('id', $request['user_id'])->first();
    users::where('id', $request['user_id'])
      ->update([
        'email' => $request['email'],
      ]);
    return redirect()->route('manageusers')
      ->with('message', 'Action Successful!');
  }

  public function delagent(Request $request, $id)
  {
    //delete the user from agent model if exists
    $agent = agents::where('agent', $id)->first();
    if (!empty($agent)) {
      agents::where('id', $agent->id)->delete();
    }
    return redirect()->back()
      ->with('message', "Action successful!.");
  }


  //Add agent
  public function addagent(Request $request)
  {

    //get agent if exists
    $ag = agents::where('agent', $request['user'])->first();
    //check if the agent already exists
    if (count($ag) > 0) {
      //update the agent info
      agents::where('id', $ag->id)->increment('total_refered', $request['referred_users']);
    } else {
      //add the referee to the agents model

      $agent_id = DB::table('agents')->insertGetId(
        [
          'agent' => $request['user'],
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now(),
        ]
      );
      //increment refered clients by 1
      agents::where('id', $agent_id)->increment('total_refered', $request['referred_users']);
    }

    return redirect()->route('agents')
      ->with('message', 'action successful!');
  }


  //Add User
  public function add_user(Request $request)
  {

    $this->validate($request, [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone_number' => 'required',
      'sex' => 'required',
      'birth_date' => 'required',
      'city' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'country' => 'required',
    ]);


    $settings = settings::where('id', '1')->first();
    $password = str_random(10);
    $user = User::create([
      'name' => $request['first_name'],
      'l_name' => $request['last_name'],
      'email' => $request['email'],
      'password' => bcrypt($password),
      'phone_number' => $request['phone_number'],
      'adress' => $request['address'],
      'city' => $request['city'],
      'country' => $request['country'],
      'birth_date' => $request['birth_date'],
      'sex' => $request['sex'],
    ]);
    $user->update(['ref_link' => $settings->site_address . 'register/' . Str::lower($user->name . $user->l_name) . "&" . $user->id,]);

    //send email
    $objDemo = new \stdClass();
    $objDemo->receiver_email = $user->email;
    $objDemo->receiver_password = $password;
    $objDemo->sender = "$settings->site_name";
    $objDemo->receiver_name = $user->name;
    $objDemo->receiver_l_name = $user->l_name;
    $objDemo->acct_activate_link = $settings->site_address . "activate/" . session()->getId();

    Mail::to($user->email)->send(new NewRegistration($objDemo));

    //toastr()->success('New user successful register !', 'Succès');

    //$request->session()->flush();
    $request->session()->put('message', 'New user successful register !');

    return response()->json([
      "message" => 'New user successful register !'
    ], 200);

    return redirect()->back()
      ->with('message', 'New user successful register !');
  }

  public function user($id)
  {
    return users::where('id', $id)->first();
  }

  //Update User
  public function update_user(Request $request, $id)
  {

    $this->validate($request, [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'phone_number' => 'required',
      'sex' => 'required',
      'birth_date' => 'required',
      'city' => 'required|string|max:255',
      'address' => 'required|string|max:255',
      'country' => 'required',
    ]);

    users::where('id', $id)
      ->update([
        'name' => $request['first_name'],
        'l_name' => $request['last_name'],
        'phone_number' => $request['phone_number'],
        'adress' => $request['address'],
        'city' => $request['city'],
        'country' => $request['country'],
        'birth_date' => $request['birth_date'],
        'sex' => $request['sex'],
      ]);

    $request->session()->put('message', 'User information are updated successfully !');

    return response()->json([
      "message" => 'User information are updated successfully'
    ], 200);

    return redirect()->route("manageusers")
      ->with('message', 'User Information Updated Sucessful');
  }

  public function update_logs_settings($id)
  {
    $user = users::where('id', $id)->first();
    if ($user) {

      $user->savelogs = !$user->savelogs;
      $user->update();
      $state = $user->savelogs == 1 ? "save" : "keep on secret";

      notifications::create([
        'user_id' => $user->id,
        'motif' => "Activities Logs",
        'message' => "All your activities logs will $state.",
      ]);


      return redirect()->back()
        ->with('message', "Action successful!.");
    } else {
      return redirect()->back()
        ->with('errors', "User not found.");
    }
  }


  public function update_2FA_settings($id)
  {
    //check user
    $user = users::where('id', $id)->first();
    if ($user) {

      //if user exist set new value and update in db

      $user->enable_2fa = !$user->enable_2fa;
      $user->update();
      $state = $user->savelogs == 1 ? "enable" : "disable";

      notifications::create([
        'user_id' => $user->id,
        'motif' => "2 Factor Auth",
        'message' => "Your account 2 Factor Auth are $state.",
      ]);

      return redirect()->back()
        ->with('message', "Action successful!.");
    } else {
      //if user not found return errors message
      return redirect()->back()
        ->with('errors', "User not found.");
    }
  }

  //Delete user
  public function deluser(Request $request, $id)
  {
    //delete the user's withdrawals and deposits
    $deposits = deposits::where('user', $id)->get();
    if (!empty($deposits)) {
      foreach ($deposits as $deposit) {
        deposits::where('id', $deposit->id)->delete();
      }
    }
    $withdrawals = withdrawals::where('user', $id)->get();
    if (!empty($withdrawals)) {
      foreach ($withdrawals as $withdrawals) {
        withdrawals::where('id', $withdrawals->id)->delete();
      }
    }
    //delete the tp_transactions
    $tps = tp_transactions::where('user', $id)->get();
    if (!empty($tps)) {
      foreach ($tps as $tp) {
        //delete tp_transactions that their owner does not exist 
        tp_transactions::where('id', $tp->id)->delete();
      }
    }

    //delete the user plans
    $userp = user_plans::where('user', $id)->get();
    if (!empty($userp)) {
      foreach ($userp as $p) {
        //delete plans that their owner does not exist 
        user_plans::where('id', $p->id)->delete();
      }
    }

    //delete all notifications of user
    $notifications = notifications::where('user_id', $id)->get();
    if (!empty($notifications)) {
      foreach ($notifications as $notification) {
        //delete notifications that their owner does not exist 
        notifications::where('id', $notification->id)->delete();
      }
    }

    //delete the user activities logs
    $userlogs = userlogs::where('user', $id)->get();
    if (!empty($userlogs)) {
      foreach ($userlogs as $userlog) {
        //delete userlogs that their owner does not exist 
        userlogs::where('id', $userlog->id)->delete();
      }
    }

    //delete the user from agent model if exists
    $agent = agents::where('agent', $id)->first();
    if (!empty($agent)) {
      agents::where('id', $agent->id)->delete();
    }
    users::where('id', $id)->delete();
    return redirect()->route('manageusers')
      ->with('message', 'User has been deleted!');
  }

  public function referusers()
  {

    if (Auth::user()->type == "0") {
      $users = users::latest()->where('ref_by', Auth::id())->get();
      if (count($users) == 0) {
        return redirect()->back()
          ->with('message', "You have not sponsored any users!");
      }
    } else {
      $users = users::latest()->where('ref_by', '!=', NULL)->get();
    }

    return view('billion.dashboard.refer-users')->with(array(
      'title' => 'Refer user',
      'earnings' => Auth::user()->type == "0" ? Auth::user()->ref_bonus ?? "0" : users::all()->sum("ref_bonus"),
      'nbre_refers' => count($users),
      'users' => $users,
      'settings' => settings::where('id', '=', '1')->first()
    ));
  }

  public function referuser()
  {
    $array = users::all();
    return view('referuser')->with(array(
      'title' => 'Refer user',
      'team' => users::where('ref_by', 0)->get(),
      'settings' => settings::where('id', '=', '1')->first()
    ));
  }

  //Get downlines level
  public function getdownlines($array, $parent = 0, $level = 0)
  {
    $referedMembers = '';
    foreach ($array as $entry) {
      if ($entry->ref_by == $parent) {

        if ($level == 0) {
          $levelQuote = "Direct referral";
        } else {
          $levelQuote = "Indirect referral level $level";
        }

        $referedMembers .= "
          <tr>
          <td> $entry->name $entry->l_name </td> 
          <td> $levelQuote </td>" .
          '<td>' . $this->getUserParent($entry->id) . '</td>' .
          '<td>' . $this->getUserStatus($entry->id) . '</td>
          <td>' . $this->getUserRegDate($entry->id) . '</td>
          </tr>';

        $referedMembers .= $this->getdownlines($array, $entry->id, $level + 1);
      }

      if ($level == 5) {
        break;
      }
    }
    return $referedMembers;
  }

  //Get user Parent
  function getUserParent($id)
  {
    $user = users::where('id', $id)->first();
    $parent = users::where('id', $user->ref_by)->first();
    if ($parent) {
      return "$parent->name $parent->l_name";
    } else {
      return "null";
    }
  }

  //Get user status
  function getUserStatus($id)
  {
    $user = users::where('id', $id)->first();

    return $user->status;
  }

  //Get User Registration Date
  function getUserRegDate($id)
  {
    $user = users::where('id', $id)->first();

    return $user->created_at;
  }


  // pay with card option
  public function paywithcard(Request $request, $amount)
  {
    require_once 'billing/config.php';

    $t_p = $amount * 100; //total price in cents

    //session variables for stripe charges
    $request->session()->put('t_p', $t_p);
    $request->session()->put('c_email', Auth::user()->email);

    return view('payment')->with(array(
      'title' => 'Pay with card',
      't_p' => $t_p,
      'settings' => settings::where('id', '=', '1')->first()
    ));

    echo '<link href="' . asset('css/bootstrap.css') . '" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="' . asset('js/bootstrap.min.js') . '"></script>';
    return ('<div style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>You will be redirected to your payment page!</h1>
    
    <h4 style="color:#222;">Click on the button below to proceed.</h4>

    <form action="charge" method="post">
    <input type="hidden" name="_token" value="' . csrf_token() . '">
      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="' . $stripe['publishable_key'] . '"
          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
          data-name="' . $set->site_name . '"
          data-description="Account fund"
          data-amount="' . $t_p . '"
          data-locale="auto">
      </script>
    </form>
    </div>

    ');
  }

  //stripe charge customer
  public function charge(Request $request)
  {
    include 'billing/charge.php';

    //process deposit and confirm the user's plan
    //confirm the users plan

    users::where('id', Auth::user()->id)
      ->update([
        'confirmed_plan' => Auth::user()->plan,
        'activated_at' => \Carbon\Carbon::now(),
        'last_growth' => \Carbon\Carbon::now(),
      ]);
    //get plan
    $p = plans::where('id', Auth::user()->plan)->first();
    //get settings 
    $settings = settings::where('id', '=', '1')->first();
    $earnings = $settings->referral_commission * $up / 100;

    if (!empty(Auth::user()->ref_by)) {
      //increment the user's referee total clients activated by 1
      agents::where('agent', Auth::user()->ref_by)->increment('total_activated', 1);
      agents::where('agent', Auth::user()->ref_by)->increment('earnings', $earnings);

      //add earnings to agent balance
      //get agent
      $agent = users::where('id', Auth::user()->ref_by)->first();
      users::where('id', Auth::user()->ref_by)
        ->update([
          'account_bal' => $agent->account_bal + $earnings,
        ]);

      //credit commission to ancestors
      $deposit_amount = $up;
      $array = users::all();
      $parent = Auth::user()->id;
      $this->getAncestors($array, $deposit_amount, $parent);
    }


    //save deposit info
    $dp = new deposits();

    $dp->amount = $up;
    $dp->payment_mode = 'Credit card';
    $dp->status = 'processed';
    $dp->proof = 'stripe';
    $dp->plan = Auth::user()->plan;
    $dp->user = Auth::user()->id;
    $dp->save();

    return redirect()->route('dashboard')->with('message', "Successfully charged $set->currency$up!");

    echo '<h1 style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;">Successfully charged ' . $set->currency . '' . $up . '!<br/>
  <small style="color:#333;">Returning to dashboard</small>
  </h1>';

    //redirect to dashboard after 5 secs
    echo '
  <script>
  window.setTimeout(function(){
    window.location.href = "../";
  }, 5000);
  </script>
    ';
  }

  public function getAncestors($array, $parent, $deposit_amount, $level = 1)
  {
    $referedMembers = '';
    //$array=users::all();
    foreach ($array as $entry) {
      if ($parent->ref_by == $entry->id) {
        // return "$entry->id <br>";
        $referedMembers .= '- ' . $entry->name . '<br/>';
        //get settings 
        $settings = settings::where('id', '=', '1')->first();

        if ($level == 1) {
          $earnings = $settings->referral_commission1 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
            ]);
          //increment in agent (ref) table
          agents::where('agent', $entry->id)->increment('earnings', $earnings);
        } elseif ($level == 2) {
          $earnings = $settings->referral_commission2 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
            ]);
          //increment in agent (ref) table
          agents::where('agent', $entry->id)->increment('earnings', $earnings);
        } elseif ($level == 3) {
          $earnings = $settings->referral_commission3 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
            ]);
          //increment in agent (ref) table
          agents::where('agent', $entry->id)->increment('earnings', $earnings);
        } elseif ($level == 4) {
          $earnings = $settings->referral_commission4 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
            ]);
          //increment in agent (ref) table
          agents::where('agent', $entry->id)->increment('earnings', $earnings);
        } elseif ($level == 5) {
          $earnings = $settings->referral_commission5 * $deposit_amount / 100;
          //add earnings to ancestor balance
          users::where('id', $entry->id)
            ->update([
              'account_bal' => $entry->account_bal + $earnings,
            ]);
          //increment in agent (ref) table
          agents::where('agent', $entry->id)->increment('earnings', $earnings);
        }

        $referedMembers .= $this->getAncestors($array, $entry, $level + 1);
      }
    }
    //return $referedMembers;
  }
}
