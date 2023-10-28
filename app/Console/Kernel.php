<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendEmail::class,
        Commands\AutoTopup::class,
        Commands\ActivateLink::class,
        Commands\SubscriptionPlan::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule){
        
        //$schedule->command('send:email')->everyMinute();
        $schedule->command('auto:topup')->dailyAt('09:00');
        //$schedule->command('auto:topup')->hourlyAt(07);	
        //$schedule->command('auto:topup')->dailyAt('09:00');
        //$schedule->command('subscription:plan')->monthly();
        //$schedule->command('send:activate_link')->weekly();
        
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
