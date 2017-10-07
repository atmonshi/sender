<?php

namespace wa7eedem\smsGate;

use Illuminate\Support\ServiceProvider;

class SmsGateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/sender.php' => config_path('sender.php'),
        ]);

        $this->app->make('wa7eedem\smsGate\api');
    }
}
