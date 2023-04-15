<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\ProcessLinks;
use App\Jobs\EmailExpiringTrials;
use App\Jobs\EmailExpiredTrials;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:download-public-suffix-data')->daily();
        $schedule->command('app:process-links')->daily();
        $schedule->command('app:clean-trial-account-short-domains')->daily();
        $schedule->job(new EmailExpiringTrials)->daily();
        $schedule->job(new EmailExpiredTrials)->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
