<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public function constituency()
    {
    	return $this->hasMany('App\Constituency');
    }

    public function ward()
    {
    	return $this->hasManyThrough('App\Ward','App\Constituency');
    }
}
