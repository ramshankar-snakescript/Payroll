<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;


use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('inspire')->hourly();
    //     $schedule->command('salary:cron')->monthlyOn(7, '00:00');
    // }
    protected function schedule(Schedule $schedule)
    {
       // $schedule->command('inspire')->min();
        $schedule->call(function () {
            // Get the current month's 7th day
            $seventhDay = date('Y-m-07');
    
            // Check if the 7th day is a Saturday (6) or Sunday (0)
            if (date('w', strtotime($seventhDay)) === '6' || date('w', strtotime($seventhDay)) === '0') {
                // If it's a weekend, add days to get the nearest Monday
                $daysToAdd = 0;
                while (date('w', strtotime($seventhDay . " +$daysToAdd day")) === '6' || date('w', strtotime($seventhDay . " +$daysToAdd day")) === '0') {
                    $daysToAdd++;
                }
                $mondayAfterSeventh = date('Y-m-d', strtotime($seventhDay . " +$daysToAdd day"));
            } else {
                // If it's not a weekend, use the 7th day itself
                $mondayAfterSeventh = $seventhDay;
            }
        })->monthlyOn(07, '00:00');
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
