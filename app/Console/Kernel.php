<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\InterviewInvitations;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //deleting rejected interview request
        $schedule->call(function () {
            InterviewInvitations::where('STATUS', 'rejected')->delete();
        })->monthly()->sundays()->at('00:00');


        $schedule->call(function () {
            Cache::store(env('CURRENT_CACHE_SERVICE'))->flush();
        })->monthly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
