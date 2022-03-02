<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductCategoryClass';
    }
}