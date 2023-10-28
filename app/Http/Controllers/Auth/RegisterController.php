<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\agents;
use App\settings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Mail\newregisteration;
use App\Mail\NewRegistration;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify_account';

   

    /*
    protected function redirectTo()
    {
        return '/login';
    }
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verify_account()
    {
        return view('auth.verify');
    }

    public function resend_verify_account_email_link(Request $request)
    {
        $settings = settings::where('id','1')->first();

        $user = User::where('email',$request->email)->first();
        $objDemo = new \stdClass();
        $objDemo->receiver_email = $user->email;
        $objDemo->receiver_password = $user->password;
        $objDemo->sender = "$settings->site_name";
        $objDemo->receiver_name = $user->l_name . " ". $user->name ;
        $objDemo->acct_activate_link = $settings->site_address."activate/".session()->getId();

        Mail::to($user->email)->send(new NewRegistration($objDemo));
        
        return view('auth.verify');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|string|max:15',
            'adress' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'country' => 'required',
            'sex' => 'required',
            'term_of_service' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
       
        //$this->validator($request->all())->validate();
        $settings = settings::where('id','1')->first();
        //send email
        $objDemo = new \stdClass();
        $objDemo->receiver_email = $data['email'];
        $objDemo->receiver_password = $data['password'];
        $objDemo->sender = "$settings->site_name";
        $objDemo->receiver_name =  $data['last_name'] . " ". $data['first_name'] ;
        $objDemo->acct_activate_link = $settings->site_address."activate/".session()->getId();

        Mail::to($data['email'])->send(new NewRegistration($objDemo));
        
        $user = User::create([
            'name' => $data['first_name'],
            'l_name'=>$data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'sex' => $data['sex'],
            'city' => $data['city'],
            'adress' => $data['adress'],
            'birth_date' =>Carbon::parse($data['birth_date']),
            'country' => $data['country'],
            'act_session' => session()->getId(),
            'ref_by' => $data['ref_by'],
        ]);
        
        $user->update(['ref_link' => $settings->site_address.'register/'.Str::lower($user->name.$user->l_name)."&".$user->id,]);
        
        if($user->ref_by){
            
            $ag = agents::where('agent',$user->ref_by)->first();
            
            if(count($ag)>0){
                //update the agent info
                agents::where('id',$ag->id)->increment('total_refered', 1);
            }
            else{
                //add the referee to the agents model
    
                $agent_id = DB::table('agents')->insertGetId([
                  'agent' => $user->ref_by,
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now(),
                ]);
                
                //increment refered clients by 1
                agents::where('id',$agent_id)->increment('total_refered', 1);
            }
            
        }
            
        return $user;
        
    }
}
