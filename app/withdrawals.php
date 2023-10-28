<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawals extends Model
{

    public function duser(){
    	return $this->belongsTo('App\users', 'user');
    }
 
    public function userplan(){
    	return $this->belongsTo('App\user_plans', 'user_plan');
    }
 
}
