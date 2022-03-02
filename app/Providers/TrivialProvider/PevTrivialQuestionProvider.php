<?php

namespace App\Providers\TrivialProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\TrivialClass\PevTrivialQuestionClass;

class PevTrivialQuestionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevTrivialQuestionClass', function ($app) {
            return new PevTrivialQuestionClass();
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
