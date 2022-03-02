<?php

namespace App\Providers\TrivialProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\TrivialClass\PevTrivialThemeClass;

class PevTrivialThemeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevTrivialThemeClass', function ($app) {
            return new PevTrivialThemeClass();
        });
    
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
