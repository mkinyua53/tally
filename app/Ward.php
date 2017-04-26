<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public function aspirant()
    {
    	return $this->hasMany('App\Ward');
    }

    public function station()
    {
    	return $this->hasMany('App\Station');
    }

    public function constituency()
    {
    	return $this->belongsTo('App\Constituency');
    }
}
