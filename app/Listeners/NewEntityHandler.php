<?php

namespace App\Listeners;

use App\Events\NewEntityCreated;
use App\Jobs\SendEmailToAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewEntityHandler
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
     * @param  NewEntityCreated  $event
     * @return void
     */
    public function handle(NewEntityCreated $event)
    {
        $details = [
            'entity' => $event->date->entity,
            'message' => $event->date->message,
            'entity_id' => $event->date->entity_id,
        ];

        SendEmailToAdmin::dispatch($details)->onQueue('admin-notification');
    }
}
