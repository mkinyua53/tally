<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ResultSaved' => [
            'App\Listeners\LogResult',
        ],
        'App\Events\ResultUpdating' => [
            'App\Listeners\LogResultUpdate',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        \App\Result::saved(function(\App\Result $result) {
            event(new \App\Events\ResultSaved($result));
        });

        \App\Result::updating(function(\App\Result $result) {
            event(new \App\Events\ResultUpdating($result));
        });
    }
}
