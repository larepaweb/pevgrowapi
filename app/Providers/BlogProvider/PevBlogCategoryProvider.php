<?php

namespace App\Providers\BlogProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\BlogClass\PevBlogCategoryClass;

class PevBlogCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevBlogCategoryClass', function ($app) {
            return new PevBlogCategoryClass();
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
