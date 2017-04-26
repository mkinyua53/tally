<?php

namespace App;

use App\Events\ResultSaved;
use App\Events\ResultUpdating;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'station_id','agent_id','time','aspirant_id','votes'
    	];

    protected $events = [
        'saved','updating'
        ];

    public function aspirant()
    {
    	return $this->belongsTo('App\Aspirant');
    }

    public function station()
    {
    	return $this->belongsTo('App\Station');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
}
