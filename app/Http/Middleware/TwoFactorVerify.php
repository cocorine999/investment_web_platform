<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
//use Twilio;

use App\settings;
use App\Mail\NewNotification;
use App\Mail\Twofa;
use App\Mail\TwoAuthentification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user = Auth::user();
        $settings = settings::where('id','1')->first();
        if($user->enable_2fa == 0){
            return $next($request);
        }
        elseif($user->token_2fa_expiry > Carbon::now()){
            return $next($request);
        } 
        
        $user->token_2fa = mt_rand(10000,99999);
        $user->save();        
        // This is the twilio way
        //Twilio::message($user->phone_number, 'Two Factor Code: ' . $user->token_2fa);
        // If you want to use email instead just 
        // send an email to the user here ..
        //send 2fa email notification
        $settings=settings::where('id', '=', '1')->first();
        $objDemo = new \stdClass();
        $objDemo->message = $user->token_2fa;
        $objDemo->sender = $settings->site_name;
        $objDemo->subject = "Two Factor Code";
        $objDemo->date = Carbon::Now();
            
        Mail::bcc($user->email)->send(new TwoAuthentification($objDemo));
        
        return redirect('/2fa');  
    }
}