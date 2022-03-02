<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogCommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogCommentClass';
    }
}