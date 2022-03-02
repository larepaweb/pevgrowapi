<?php

namespace App\Providers\FaqProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\FaqsClass\PevFaqCategoryLangClass;

class PevFaqCategoryLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevFaqCategoryLangClass', function ($app) {
            return new PevFaqCategoryLangClass();
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
