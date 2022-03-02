<?php

namespace App\Providers\BlogProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\BlogClass\PevBlogCommentClass;

class PevBlogCommentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevBlogCommentClass', function ($app) {
            return new PevBlogCommentClass();
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
