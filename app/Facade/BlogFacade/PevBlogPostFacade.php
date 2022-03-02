<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogPostFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogPostClass';
    }
}