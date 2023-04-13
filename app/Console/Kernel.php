<?php

namespace App\Console;

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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('weekly:mail')->everyMinute()->timezone('UCT');
        $schedule->command('remainder:mail')->everyMinute()->timezone('UCT');
        // $schedule->command('weekly:mail')->weekly()->fridays()->at('8:00')->timezone('Europe/London');
        // $schedule->command('remainder:mail')->weekly()->fridays()->at('14:00')->timezone('Europe/London');
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
