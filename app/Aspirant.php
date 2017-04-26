<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name','ward_id','avatar','votes','level'
    	];

    public function result()
    {
    	return $this->hasMany('App\Result');
    }

    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }

    public function station()
    {
        return $this->belongsToMany('App\Station')->withTimestamps();
    }
}
