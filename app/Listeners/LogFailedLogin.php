<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(Failed $event)
    {
        // Log failed login attempts here
        \Log::warning('Failed login attempt for user: ' . $event->credentials['email']);
    }
}
