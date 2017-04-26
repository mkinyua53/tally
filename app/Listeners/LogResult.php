<?php

namespace App\Listeners;

use App\Events\ResultSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogResult
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResultSaved  $event
     * @return void
     */
    public function handle(ResultSaved $event)
    {
        \Log::info('Results manipulated - '.$event->result);
    }
}
