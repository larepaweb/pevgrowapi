<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductFeatureValueFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductFeatureValueClass';
    }
}