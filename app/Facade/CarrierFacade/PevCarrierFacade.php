<?php

namespace App\Facade\CarrierFacade;

use Illuminate\Support\Facades\Facade;

class PevCarrierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCarrierClass';
    }
}