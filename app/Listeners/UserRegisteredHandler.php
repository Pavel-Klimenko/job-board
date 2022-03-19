<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Jobs\SendEmailToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserRegisteredHandler
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
     * @param  NewUserRegistered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        $details = [
            'user_id' => $event->date->user_id,
            'role_id' => $event->date->role_id,
        ];

        SendEmailToAdmin::dispatch($details)->onQueue('admin-notification');
    }
}
