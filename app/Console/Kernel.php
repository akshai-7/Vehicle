<?php

namespace App\Console;

use App\Console\Commands\weekly;
use App\Console\Commands\remainder;
use App\Console\Commands\UpdateStatusCommand;
use App\Console\Commands\service;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule~
     * @return void
     */

    protected $commands = [
        weekly::class,
        remainder::class,
        UpdateStatusCommand::class,
        service::class,
    ];

    protected function schedule(Schedule $schedule)
    {

        $schedule->command('UpdateStatusCommand:update')->daily(); // Run the command daily
        $schedule->command('service:update')->daily(); // Run the command daily
        $schedule->command('weekly:mail')->weekly()->fridays()->at('8:00')->timezone('Europe/London')->withoutOverlapping();
        $schedule->command('remainder:mail')->weekly()->fridays()->at('14:00')->timezone('Europe/London')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
