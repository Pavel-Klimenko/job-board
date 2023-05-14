<?php

namespace App\Listeners;

use App\Events\NewUserMessage;
use App\Jobs\SendEmailToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserMessageHandler
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
     * @param  NewUserMessage  $event
     * @return void
     */
    public function handle(NewUserMessage $event)
    {
        $details = [
            'entity' => $event->date->entity,
            'message' => $event->date->message,
            'text' => $event->date->text,
        ];

        SendEmailToAdmin::dispatch($details)->onQueue('admin-notification');
    }
}
