<?php

namespace App\Listeners;

use App\Events\OurExampleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OurExampleListener
{
    public function __construct()
    {
        //
    }

    public function handle(OurExampleEvent $event)
    {
        Log::debug("The User {$event->username} just performed {$event->action}");
    }
}