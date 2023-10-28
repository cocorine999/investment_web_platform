<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{

  /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'activated_at','entered_at','last_growth'];

    public function gh(){
    	return $this->hasMany('App\gh', 'donation_from');
    }

    public function ruser(){
    	return $this->hasMany('App\gh', 'donation_to');
    }

    public function dp(){
    	return $this->hasMany('App\deposits', 'user');
    }

    public function wd(){
    	return $this->hasMany('App\withdrawals', 'user');
    }

    public function userplans(){
    	return $this->hasMany('App\user_plans', 'user');
    }
    
    public function user_logs(){
    	return $this->hasMany('App\userlogs', 'user');
    }

    protected $fillable = [
      'name', 'l_name', 'email', 'phone_number', 'password', 'act_session','ref_by','ref_link','adress','roi','city','country','sex','birth_date','status',
    ];
}
