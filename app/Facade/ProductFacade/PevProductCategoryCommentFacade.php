<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductCategoryCommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductCategoryCommentClass';
    }
}