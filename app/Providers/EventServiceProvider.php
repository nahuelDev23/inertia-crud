<?php

namespace App\Providers;

use App\Events\increaseScoreCommentEvent;
use App\Listeners\increaseScoreCommentListener;
use Illuminate\Auth\Events\Registered;
use App\Events\increaseScoreEvent;
use App\Listeners\increaseScoreListener;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        increaseScoreEvent::class => [
            increaseScoreListener::class,
        ],
        increaseScoreCommentEvent::class => [
            increaseScoreCommentListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
