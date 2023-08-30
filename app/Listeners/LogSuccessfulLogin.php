<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }



    public function handle(Login $event)
    {
        // Log successful login attempts here
        \Log::info('Successful login for user: ' . $event->user->email);
    }
}
