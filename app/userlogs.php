<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userlogs extends Model
{
    //@var array
    protected $fillable = ['user', 'type', 'browser', 'ip'];

    public function user(){
        return $this->belongsTo('App\users', 'user');
    }
}
