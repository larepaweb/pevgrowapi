<?php

namespace App\Providers\FaqProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\FaqsClass\PevFaqClass;

class PevFaqProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevFaqClass', function ($app) {
            return new PevFaqClass();
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
