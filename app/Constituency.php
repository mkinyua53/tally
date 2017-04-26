<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    public function ward()
    {
    	return $this->hasMany('App\Ward');
    }

    public function county()
    {
    	return $this->belongsTo('App\County');
    }
}
