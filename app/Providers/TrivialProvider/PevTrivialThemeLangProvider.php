<?php

namespace App\Providers\TrivialProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\TrivialClass\PevTrivialThemeLangClass;

class PevTrivialThemeLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevTrivialThemeLangClass', function ($app) {
            return new PevTrivialThemeLangClass();
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
