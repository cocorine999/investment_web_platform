<?php

use Illuminate\Http\Request;

use App\Mail\newregisteration;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    
    return $request->user();
});

Route::post('enregistrement', 'Auth\RegisterController@create')->name('enregistrement');
Route::post('register', 'Auth\RegisterController@register')->name('api.register');

Route::get('sendmailing', function () {

    try {

        $objDemo = new \stdClass();
        $objDemo->receiver_email     = "bocogacorine@gmail.com";
        $objDemo->receiver_password  = "password";
        $objDemo->sender             = "BillionCycle";
        $objDemo->receiver_name      = "Corine";
        $objDemo->receiver_name      = "BOCOGA";
        $objDemo->acct_activate_link = "https://127.0.0.1:8000/activate";

        Mail::to("bocogacorine@gmail.com")->send(new newregisteration($objDemo));

    }
    
    catch (\Exception $e) {

        $message = $e->message();
        return response()->json($message,Response::HTTP_UNPROCESSABLE_ENTITY);

    }
});