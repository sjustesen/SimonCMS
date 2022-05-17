<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\MediaUploadedEvent::class => [
            \App\Listeners\MediaUploadedListener::class,
        ],
        \App\Events\DoctypeSavedEvent::class => [
            \App\Listeners\DoctypeSavedListener::class
        ]
    ];

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
