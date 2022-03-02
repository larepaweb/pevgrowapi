<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogCategoryClass';
    }
}