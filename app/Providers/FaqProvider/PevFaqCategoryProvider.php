<?php

namespace App\Providers\FaqProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\FaqsClass\PevFaqCategoryClass;

class PevFaqCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevFaqCategoryClass', function ($app) {
            return new PevFaqCategoryClass();
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
