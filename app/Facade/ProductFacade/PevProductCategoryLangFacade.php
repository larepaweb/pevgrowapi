<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductCategoryLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductCategoryLangClass';
    }
}