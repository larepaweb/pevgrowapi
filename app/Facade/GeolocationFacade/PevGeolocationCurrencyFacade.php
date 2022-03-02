<?php

namespace App\Facade\GeolocationFacade;

use Illuminate\Support\Facades\Facade;

class PevGeolocationCurrencyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevGeolocationCurrencyClass';
    }
}