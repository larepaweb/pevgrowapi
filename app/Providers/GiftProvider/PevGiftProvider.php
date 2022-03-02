<?php

namespace App\Providers\GiftProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\GiftClass\PevGiftClass;

class PevGiftProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevGiftClass', function ($app) {
            return new PevGiftClass();
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
