<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\NewCourrierAddedEvent::class => [
            \App\Listeners\AddToHistoryListener::class,
        ],

        \App\Events\ValidateCourrierEvent::class => [
            \App\Listeners\SendNotificationListener::class,
        ],

        \App\Events\ChangeCourrierStateEvent::class => [
            \App\Listeners\ChangeCourrierStateListener::class,
        ],

        \App\Events\ClotureCourrierEvent::class => [
            \App\Listeners\ClotureCourrierListener::class,
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

        //
    }
}
