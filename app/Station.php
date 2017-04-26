<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name','ward_id','expected_votes','spoilt','valid'
    	];

    public function aspirant()
    {
    	return $this->belongsToMany('App\Aspirant')->withTimestamps();
    }

    public function result()
    {
    	return $this->hasMany('App\Result');
    }

    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }
}
