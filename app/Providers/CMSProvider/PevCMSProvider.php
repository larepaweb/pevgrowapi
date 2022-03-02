<?php

namespace App\Providers\CMSProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CMSClass\PevCMSClass;

class PevCMSProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCMSClass', function ($app) {
            return new PevCMSClass();
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
