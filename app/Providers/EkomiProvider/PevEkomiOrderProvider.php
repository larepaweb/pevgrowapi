<?php

namespace App\Providers\EkomiProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\EkomiClass\PevEkomiOrderClass;

class PevEkomiOrderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevEkomiOrderClass', function ($app) {
            return new PevEkomiOrderClass();
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
