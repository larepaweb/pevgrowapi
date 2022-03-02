<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevFeatureValuePevProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevFeatureValuePevProductClass';
    }
}