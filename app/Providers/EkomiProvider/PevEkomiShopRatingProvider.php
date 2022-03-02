<?php

namespace App\Providers\EkomiProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\EkomiClass\PevEkomiShopRatingClass;

class PevEkomiShopRatingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevEkomiShopRatingClass', function ($app) {
            return new PevEkomiShopRatingClass();
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
