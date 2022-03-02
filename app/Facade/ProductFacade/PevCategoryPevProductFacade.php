<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevCategoryPevProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCategoryPevProductClass';
    }
}