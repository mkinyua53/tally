<?php

namespace App\Listeners;

use App\Events\ResultUpdating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogResultUpdate
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
     * @param  ResultUpdating  $event
     * @return void
     */
    public function handle(ResultUpdating $event)
    {
        \Log::info('Result being updated - '.$event->result);
    }
}
