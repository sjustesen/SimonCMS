<?php

namespace App\Listeners;

use App\Events\DoctypeSavedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DoctypeSavedListener
{
    public DoctypeSavedEvent $saved; 
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
     * @param  \App\Events\DoctypeSavedEvent  $event
     * @return void
     */
    public function handle(DoctypeSavedEvent $event)
    {
        $this->saved = $event;
    }
}
