<?php

namespace App\Facade\CarrierFacade;

use Illuminate\Support\Facades\Facade;

class PevCarrierLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCarrierLangClass';
    }
}