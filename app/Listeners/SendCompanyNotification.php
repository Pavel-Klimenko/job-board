<?php

namespace App\Listeners;

use App\Events\CandidateInvitation;
use App\Events\VacancyInterviewRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use \Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;

class SendCompanyNotification extends Controller
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
    public function handle(VacancyInterviewRequest $event)
    {

        $details = [
            'name' => $event->date->name,
            'email' => $event->date->email,
            'email_to' => $event->date->company_email,
            'message' => $event->date->message,
            'candidate_id' => $event->date->candidate_id,
            'candidate_name' => $event->date->candidate_name,
            'candidate_email' => $event->date->candidate_email,
            'candidate_phone' => $event->date->candidate_phone,
            'covering_letter' => $event->date->covering_letter,
            'vacancy_id' => $event->date->vacancy_id,
            'vacancy_name' => $event->date->vacancy_name,
        ];


        SendEmail::dispatch($details);
    }
}
