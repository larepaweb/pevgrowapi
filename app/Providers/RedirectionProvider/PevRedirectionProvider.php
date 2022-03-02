<?php

namespace App\Providers\RedirectionProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\RedirectionClass\PevRedirectionClass;

class PevRedirectionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevRedirectionClass', function ($app) {
            return new PevRedirectionClass();
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
