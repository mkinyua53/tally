<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name','email','avatar','phone'
    	];

    public function result()
    {
    	return $this->hasMany('App\Result');
    }
}
