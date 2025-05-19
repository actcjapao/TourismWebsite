<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
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

        // Restrict commands in production
        if (app()->environment('production')) {
            $this->restrictCommands();
        }
    }

    /**
     * Restrict specific commands in production environment.
     *
     * @return void
     */
    protected function restrictCommands()
    {
        Artisan::command('migrate', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('migrate:fresh', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('migrate:rollback', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('migrate:reset', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('migrate:refresh', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('db:seed', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('cache:clear', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('config:clear', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('route:clear', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('view:clear', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('queue:restart', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('optimize', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('key:generate', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('serve', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('down', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');

        Artisan::command('up', function () {
            $this->comment('This command is disabled in production.');
        })->describe('Disabled in production environment.');
    }
}
