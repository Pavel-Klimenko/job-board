<?php

namespace App\Listeners;

use App\Events\CandidateInvitation;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use \Illuminate\Support\Facades\Mail;
use App\Jobs\QueueSenderEmail;
use App\Jobs\SendEmail;

class SendCandidateNotification extends Controller
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
     * @param  CandidateInvitation  $event
     * @return void
     */
    public function handle(CandidateInvitation $event)
    {

        $details = [
            'name' => $event->date->name,
            'email' => $event->date->email,
            'email_to' => $event->date->candidate_email,
            'message' => $event->date->message,
            'subject' => $event->date->subject,
            'company_name' => $event->date->company_name,
            'company_email' => $event->date->company_email,
            'company_phone' => $event->date->company_phone,
            'company_website' => $event->date->company_website,
            'vacancy_id' => $event->date->vacancy_id,
            'vacancy_name' => $event->date->vacancy_name,
        ];


        SendEmail::dispatch($details);


/*         Mail::queue('mail.candidateNotification', ['date' => $event->date], function($message) use ($event) {
             $message->from($event->date->email, $event->date->name);
             $message->to('mr-freeman89@mail.ru');
             $message->subject($event->date->subject);
         });*/

    }
}
