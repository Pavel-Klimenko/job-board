<?php

namespace App\Providers;
use App\Events;
use App\Listeners;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            Events\CandidateInvitation::class,
            [Listeners\SendCandidateNotification::class, 'handle']
        );

        Event::listen(
            Events\VacancyInterviewRequest::class,
            [Listeners\SendCompanyNotification::class, 'handle']
        );

        Event::listen(
            Events\NewEntityCreated::class,
            [Listeners\NewEntityHandler::class, 'handle']
        );

        Event::listen(
            Events\NewUserMessage::class,
            [Listeners\UserMessageHandler::class, 'handle']
        );
    }
}
