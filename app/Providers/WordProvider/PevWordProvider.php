<?php

namespace App\Providers\WordProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\WordsClass\PevWordClass;

class PevWordProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevWordClass', function ($app) {
            return new PevWordClass();
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
