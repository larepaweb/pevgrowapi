<?php

namespace App\Facade\CarrierFacade;

use Illuminate\Support\Facades\Facade;

class PevCarrierRangeWeightFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCarrierRangeWeightClass';
    }
}