<?php

namespace atmonshi\sender;

use Illuminate\Support\ServiceProvider;

class SenderServiceProvider extends ServiceProvider
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

        $this->app->make('atmonshi\sender\api');
    }
}
