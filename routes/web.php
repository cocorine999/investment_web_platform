<?php
use App\settings;
use App\Mail\newregisteration;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (version_compare(PHP_VERSION, '7.1.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

/*Route::get('/', function () {
    return view('home/index');
});*/

Route::get('/flex', function () {
    return view('acceuil.app');
})->name('flex');


Route::get('/about/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/legal/cookies', function () {
    return view('home.cookies');
})->name('cookies');

Route::get('/legal/privacy', function () { 
    return view('home.privacy');
})->name('privacy');

Route::get('/legal/legal-notices', function () {
    return view('home.legal-notices');
    
})->name('legal-notices'); 

Route::get('/legal/tos', function () { 
    return view('home.cgu');
    
})->name('cgu');


Route::get('/about/values', function () {
    return view('home.nos-valeurs');
})->name('values');

Route::get('/about/performance-indicators', function () {
    return view('home.performance-indicators');
})->name('performance-indicators');

Route::get ('');
Route::get('cloud/app/images/{file}', [ function ($file) {
    
    $settings = DB::table('settings')->where('id', '1')->first();

    $path = storage_path("../../$settings->files_key/cloud/uploads/".$file);

    if (file_exists($path)) {

        return response()->file($path, array('Content-Type' =>'image/jpeg'));

    }

    abort(503);

}]);

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');
//"The withdrawal has just been made from your account.",

Route::get('', 'UsersController@welcome')->name('home');
Route::get('/welcome', 'UsersController@index')->name('welcome');
Route::get('terms', 'UsersController@terms')->name('terms');
Route::get('privacy', 'UsersController@privacy')->name('privacy');
Route::get('about', 'UsersController@about')->name('about');
//Route::get('contact', 'UsersController@contact')->name('contact');
Route::get('faq', 'UsersController@faq')->name('faq');
Route::get('details-project/{id}', 'UsersController@details_project')->name('details-project');
//cron url
Route::get('cron', 'Controller@autotopup')->name('cron');
Route::get('autoearning', 'Controller@autoearning')->name('autoearning');

/*
Route::get('autotopup', 'Controller@autotopup')->name('autotopup');
*/
Route::get('autoconfirm', 'CoinPaymentsAPI@autoconfirm')->name('autoconfirm');


Auth::routes();
Route::get('verify_account', 'Auth\RegisterController@verify_account')->name('verify_account');
Route::post('resend_verify_account_link', 'Auth\RegisterController@resend_verify_account_email_link')->name('resend.verify_account.email.link');

    // Two Factor Authentication
    
    Route::get('2fa', 'TwoFactorController@showTwoFactorForm')->name('2fa');
    
    Route::post('2fa', 'TwoFactorController@verifyTwoFactor');
    
    Route::get('dashboard/switchuser/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'UsersController@switchuser', 'as'=>'switchuser']);
    
    Route::post('dashboard/paypalverify/{amount}', 'Controller@paypalverify')->name('paypalverify');
    
     //activate account
    Route::get('activate/{session}', 'UsersController@activate_account')->name('activate');
    
    // KYC Routes
	Route::get('dashboard/kyc', ['middleware' => 'auth', 'uses'=>'SomeController@kyc', 'as'=>'kyc']);
	Route::get('dashboard/kycs', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@kyc', 'as'=>'kycs']);
	Route::get('dashboard/detail-kyc/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@detail_kyc', 'as'=>'detail_kyc']);
	Route::get('dashboard/acceptkyc/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@acceptkyc', 'as'=>'acceptkyc']);
	Route::get('dashboard/rejectkyc/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@rejectkyc', 'as'=>'rejectkyc']);
	Route::post('dashboard/savevdocs', 'SomeController@savevdocs')->name('savevdocs');


	Route::get('licensing', 'UsersController@licensing')->name('licensing');

	Route::get('dashboard/deposits', ['middleware' => 'auth', 'uses' => 'Controller@deposits'])->name('deposits');
	
	Route::get('dashboard/skip_account', ['middleware' => 'auth', 'uses' => 'Controller@skip_account'])->name('skip_account');
	Route::get('dashboard/payment', 'SomeController@payment')->name('payment');
	Route::get('dashboard/deposit-form', 'SomeController@deposit_form')->name('deposit_form');
	Route::get('dashboard/request-withdrawal-form', 'SomeController@withdrawal_form')->name('withdrawal_form');
	Route::get('dashboard/agents', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@agents'])->name('agents');
	Route::get('dashboard/viewagent/{agent}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@viewagent'])->name('viewagent');
	Route::get('dashboard/tradinghistory', 'SomeController@tradinghistory')->name('tradinghistory');
	Route::get('dashboard/manageusers', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@manageusers'])->name('manageusers')->middleware('2fa');
	Route::get('dashboard/manageusers/{id}/userdetails/', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@user_details'])->name('user_details')->middleware('2fa');
	Route::get('dashboard/mwithdrawals', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@mwithdrawals'])->name('mwithdrawals')->middleware('2fa');
	Route::get('dashboard/mdeposits', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@mdeposits'])->name('mdeposits')->middleware('2fa');
	Route::get('dashboard/projects', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@projects'])->name('projects');
	Route::get('dashboard/withdrawals', ['middleware' => 'auth', 'uses' => 'Controller@withdrawals'])->name('withdrawalsdeposits')->middleware('2fa');
	
	//dashboard
	Route::get('dashboard', ['middleware' => 'auth', 'uses'=>'Controller@dashboard','as'=>'dashboard'])->middleware('2fa');
	
	Route::get('dashboard/ublock/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@ublock']);
	Route::get('dashboard/pdeposit/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@pdeposit']);
	Route::get('dashboard/pwithdrawal/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@pwithdrawal']);
	Route::get('dashboard/validatewithdrawal/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@validatewithdrawal']);
	Route::get('dashboard/rejectwithdrawal/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'Controller@rejectwithdrawal', 'as'=>'rejectwithdrawal']);
	Route::get('dashboard/unblock/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@unblock']);
	Route::get('dashboard/paywithcard/{amount}', ['middleware' => 'auth', 'uses' => 'UsersController@paywithcard'])->name('paywithcard');
	Route::get('dashboard/cpay/{amount}/{coin}/{ui}/{msg}', ['uses' => 'Controller@cpay'])->name('cpay');
	Route::get('dashboard/mplans', ['middleware' => 'auth', 'uses' => 'Controller@mplans'])->name('mplans');
	
	Route::get('dashboard/myplans', ['middleware' => 'auth', 'uses' => 'Controller@myplans'])->name('myplans')->middleware('2fa');

	Route::get('dashboard/makeadmin/{id}/{action}', ['middleware' => ['auth', 'admin'], 'uses'=>'UsersController@makeadmin', 'as'=>'makeadmin']);
	
	Route::get('dashboard/delagent/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'UsersController@delagent', 'as'=>'delagent']);

	Route::get('dashboard/plans/{id?}', ['middleware' => ['auth'], 'uses' => 'Controller@plans'])->name('plans');
	Route::get('dashboard/pplans', ['middleware' => 'auth', 'uses' => 'Controller@pplan'])->name('pplans');
	Route::get('dashboard/trashplan/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'Controller@trashplan']);
	Route::get('dashboard/deletewdmethod/{id}', ['middleware' => ['auth', 'admin'], 'uses' => 'SomeController@deletewdmethod']);
	Route::get('dashboard/deldeposit/{id}', ['middleware' => ['auth'], 'uses'=>'UsersController@deldeposit', 'as'=>'deldeposit']);
	Route::get('dashboard/delwithdrawal/{id}', ['middleware' => ['auth'], 'uses'=>'UsersController@delwithdrawal', 'as'=>'delwithdrawal']);
	
	//Route::get('dashboard/joinplan/{id}', ['middleware' => 'auth', 'uses' => 'Controller@joinplan']);
	//Route::get('ref/{id}', ['middleware' => 'auth', 'uses'=>'Controller@ref', 'as'=>'ref']);
	Route::get('register/{ref_link}', [ 'uses'=>'Controller@ref', 'as'=>'ref']);
	
	Route::get('dashboard/resetpswd/{id}', ['middleware' => ['auth','admin'], 'uses'=>'UsersController@resetpswd', 'as'=>'resetpassword']);
	Route::get('dashboard/reset2fa/{id}', ['middleware' => ['auth','admin'], 'uses'=>'UsersController@reset2fa', 'as'=>'reset2fa']);
	Route::get('dashboard/clearacct/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'Controller@clearacct', 'as'=>'clearacct']);
	Route::get('dashboard/deluser/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'UsersController@deluser', 'as'=>'deluser']);
	Route::get('dashboard/deletenotification/{id}', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@deleteNotification', 'as'=>'deleteNotification']);
	
	Route::get('dashboard/usertrademode/{id}/{action}', ['middleware' => ['auth', 'admin'], 'uses'=>'UsersController@usertrademode', 'as'=>'usertrademode']);
	
	Route::get('dashboard/settings', ['middleware' => ['auth', 'admin'], 'uses'=>'SomeController@settings', 'as'=>'settings'])->middleware('2fa');

    Route::get('dashboard/refer-users', ['middleware' => 'auth', 'uses' => 'UsersController@referusers'])->name("refer-users");
	
	Route::get('dashboard/analytics', ['middleware' => ['auth', 'admin'], 'uses' => function () {
		return view('billion/dashboard/analytics');
	}])->name('analytics');

	Route::get('dashboard/kycs/kyc-details', ['middleware' => ['auth', 'admin'], 'uses' => function () {
		return view('billion/dashboard/kyc/kyc-details');
	}])->name('kyc.details');

	Route::get('dashboard/welcome-kyc', ['middleware' => ['auth',], 'uses' => function () {
		return view('billion/dashboard/kyc/kyc-applications');
	}])->name('welcome.kyc');

	Route::get('dashboard/kyc/verify-account', ['middleware' => ['auth',], 'uses' => function () {
		return view('billion/dashboard/kyc/kyc-form');
	}])->name('kyc.form');

	/* Route::get('dashboard/account/account-billing', ['middleware' => ['auth',], 'uses' => function () {
		return view('billion/dashboard/account-billing');
	}])->name('billing'); */

	Route::get('dashboard/terms', ['middleware' => 'auth', 'uses' => function () {
		return view('billion/dashboard/terms');
	}])->name("terms");

	Route::get('dashboard/privacy', ['middleware' => 'auth', 'uses' => function () {
		return view('billion/dashboard/privacy');
	}])->name("privacy");
    //Route::get('dashboard/investment-details', ['middleware' => 'auth', 'uses' => 'Controller@investmentdetails'])->name("investmentdetails");

	//Search Routes
	Route::post('dashboard/manageusers', ['middleware' => 'auth', 'uses' => 'Controller@search'])->name('searchUser');
	Route::post('dashboard/searchdp', ['middleware' => 'auth', 'uses' => 'Controller@searchDp'])->name('searchDp');
	Route::post('dashboard/searchWith', ['middleware' => 'auth', 'uses' => 'Controller@searchWt'])->name('searchWt');
	Route::post('dashboard/searchsub', ['middleware' => 'auth', 'uses' => 'Controller@searchsub'])->name('searchsub');
	
	Route::get('dashboard/transactions/{id?}', ['middleware' => 'auth', 'uses' => 'Controller@transactions'])->name("transactions");

	Route::get('dashboard/investment_recovery/{id}', ['middleware' => ['auth','admin'], 'uses' => 'Controller@investment_recovery'])->name("investment_recovery");
	Route::get('dashboard/logs_activities/{id?}', ['middleware' => 'auth', 'uses' => 'Controller@logs_activities'])->name("logs_activities");
    
	Route::get('dashboard/investment', ['middleware' => 'auth', 'uses' => 'Controller@investment'])->name("investmentform");
    Route::get('dashboard/investment-details/{id?}', ['middleware' => 'auth', 'uses' => 'Controller@investmentdetails'])->name("investmentdetails");
	Route::post('dashboard/joinplan', ['middleware' => 'auth', 'uses' => 'Controller@joinplan'])->name('joinplan');
	Route::post('dashboard/paywithcard/charge', ['middleware' => 'auth', 'uses' => 'UsersController@charge']);
	Route::post('dashboard/edituser', ['middleware' => 'auth', 'uses' => 'UsersController@edituser'])->middleware('admin');
	Route::post('dashboard/updateplan', ['middleware' => 'auth', 'uses' => 'Controller@updateplan']);
	Route::post('dashboard/withdrawal', 'SomeController@withdrawal')->name('withdrawal');
	Route::post('sendcontact', 'UsersController@sendcontact');
	Route::post('dashboard/deposit', 'SomeController@deposit');
	Route::post('dashboard/sendmail', 'UsersController@sendmail')->name('sendmail');
	Route::post('dashboard/sendmailsingle', 'UsersController@sendmailtooneuser')->name('send_email_to_single_user');
	Route::post('dashboard/topup', 'SomeController@topup')->name('topup');

	Route::post('dashboard/adduser', 'UsersController@add_user')->name('add_user');
	Route::post('dashboard/updateuser/{id}', 'UsersController@update_user')->name('update_user');
	Route::get('dashboard/user/{id}', 'UsersController@user')->name('user');
	Route::get('dashboard/user_2FA_settings/{id}', 'UsersController@update_2FA_settings')->name('user_2FA_settings');
	Route::get('dashboard/user_logs_settings/{id}', 'UsersController@update_logs_settings')->name('user_logs_settings');
	Route::post('dashboard/addagent', 'UsersController@addagent');
	Route::post('dashboard/chngemail', 'UsersController@chngemail');

	Route::post('dashboard/savedeposit', 'SomeController@savedeposit')->name('savedeposit');
	Route::post('dashboard/addwdmethod', 'SomeController@addwdmethod');
	Route::post('dashboard/updatewdmethod', 'SomeController@updatewdmethod');
	Route::post('dashboard/saveuser', ['middleware' => 'auth', 'uses' => 'Controller@saveuser']);
	Route::post('dashboard/addplan', ['middleware' => 'auth', 'uses' => 'Controller@addplan'])->name('addplan');
	
	Route::post('dashboard/updatecpd', 'SomeController@updatecpd')->middleware("admin");
	Route::post('dashboard/updatesettings', 'SomeController@updatesettings')->middleware("admin");
	Route::post('dashboard/updatepreference', 'SomeController@updatepreference')->middleware("admin");
	Route::post('dashboard/updatewebinfo', 'SomeController@updatewebinfo')->middleware("admin");
	Route::post('dashboard/updatebot', 'SomeController@updatebot')->middleware("admin");
	Route::post('dashboard/updatebotswt', 'SomeController@updatebotswt')->middleware("admin");
	Route::post('dashboard/updatesubfee', 'SomeController@updatesubfee')->middleware("admin");
	

	Route::get('dashboard/account/settingup_withdrawal_account_adress', ['middleware' => 'auth', 'uses'=>'UsersController@accountdetails', 'as'=>'acountdetails']);
	Route::get('dashboard/changepassword', ['middleware' => 'auth', 'uses'=>'UsersController@changepassword', 'as'=>'changepassword']);
	Route::get('dashboard/support', ['middleware' => 'auth', 'uses'=>'Controller@support', 'as'=>'support']);
	Route::get('dashboard/withdrawal', ['middleware' => 'auth', 'uses'=>'SomeController@withdrawal', 'as'=>'withdrawal']);
	Route::get('dashboard/phusers', ['middleware' => 'auth', 'uses'=>'SomeController@phusers', 'as'=>'phusers']);
	Route::get('dashboard/matchinglist', ['middleware' => 'auth', 'uses'=>'SomeController@matchinglist', 'as'=>'matchinglist']);
	Route::get('dashboard/ghuser', ['middleware' => 'auth', 'uses'=>'SomeController@ghuser', 'as'=>'ghuser']);
	Route::get('dashboard/confirmation/{id}', ['middleware' => 'auth', 'uses'=>'UsersController@confirmation', 'as'=>'confirmation']);
	Route::get('dashboard/tupload/{id}', ['middleware' => 'auth', 'uses'=>'UsersController@tupload', 'as'=>'tupload']);
	Route::get('dashboard/dnpagent', ['middleware' => 'auth', 'uses'=>'UsersController@dnpagent', 'as'=>'dnpagent']);
	Route::get('dashboard/referuser', ['middleware' => 'auth', 'uses'=>'UsersController@referuser', 'as'=>'referuser']);

	//Route::get('dashboard/notification', 'UsersController@notification');
	Route::get('dashboard/notifications', ['middleware' => 'auth', 'uses'=>'SomeController@notification', 'as'=>'notifications']);
	Route::get('dashboard/notifications/makeHasRead/{id?}', ['middleware' => 'auth', 'uses'=>'SomeController@makeNotificationHasRead', 'as'=>'makeNotificationHasRead']);
	Route::get('dashboard/subtrade', ['middleware' => 'auth', 'uses' => 'Controller@subtrade'])->name('subtrade');
	Route::get('dashboard/msubtrade', ['middleware' => 'auth', 'uses' => 'Controller@msubtrade'])->name('subtrade');

	Route::get('dashboard/subpricechange', 'Controller@subpricechange')->middleware("admin");

	Route::post('dashboard/savemt4details', ['middleware' => 'auth', 'uses'=>'Controller@savemt4details', 'as'=>'savemt4details']);

	Route::get('dashboard/account-profile', ['middleware' => 'auth', 'uses'=>'SomeController@profile', 'as'=>'profile']);
	Route::get('dashboard/account-security', ['middleware' => 'auth', 'uses'=>'SomeController@account_security', 'as'=>'account_security']);

	// Upadting user profile info
	Route::post('dashboard/profileinfo', ['middleware' => 'auth', 'uses'=>'SomeController@updateprofile', 'as'=>'userprofile']);
	//Route::get('dashboar

	//Route::get('dashboard/plans', ['middleware' => 'auth', 'uses'=>'Controller@showplans', 'as'=>'plans']);
	Route::get('dashboard/delsub/{id}', 'Controller@delsub' );
	Route::get('dashboard/confirmsub/{id}', 'Controller@confirmsub' );
	Route::get('dashboard/delnotif/{id}', 'SomeController@delnotif' );
	Route::post('dashboard/AddHistory', 'Controller@addHistory');

	
	Route::post('dashboard/upload', 'UsersController@upload');
	Route::post('dashboard/confirm', 'UsersController@confirm');
	Route::get('dashboard/mconfirm/{id}/{ph_id}/{amount}', 'UsersController@mconfirm');
	Route::get('dashboard/mdelete/{id}/{ph_id}/{amount}', 'UsersController@mdelete');
	Route::post('dashboard/withdraw', 'SomeController@withdraw');
	Route::post('dashboard/updatephoto', 'UsersController@updatephoto');
	Route::post('dashboard/updateacct', 'UsersController@updateacct')->name('update_withdrawal_address');
	Route::post('dashboard/updatepass', 'UsersController@updatepass')->name('update_password');
	Route::post('dashboard/dnate', 'UsersController@dnate');
	Route::get('dashboard/donation', ['uses'=>'UsersController@donation', 'as'=>'donation']);
	Route::get('dashboard/donate/{plan}', ['uses'=>'UsersController@donate', 'as'=>'donate']);
	//Route::get('ref/{id}', ['uses'=>'UsersController@ref', 'as'=>'ref']);
	//Route::post('reguser', 'Auth\AuthController@reguser');
	//Route::post('register', 'Auth\RegisterController@create')->name('register');
	//Route::post('enregistrement')
	Route::post('dashboard/saveagent', 'UsersController@saveagent');


Route::group(['middleware' => 'web'], function () {
	
	
});
