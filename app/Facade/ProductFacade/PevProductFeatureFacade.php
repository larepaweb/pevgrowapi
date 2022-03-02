<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductFeatureFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductFeatureClass';
    }
}