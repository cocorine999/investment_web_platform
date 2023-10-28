<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tp_transactions extends Model
{

	protected $fillable=['user','plan','user_plan','amount','type'];
 
	public function dplan(){
    	return $this->belongsTo('App\plans', 'plan');
    }
 
 
}
