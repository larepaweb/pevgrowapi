<?php

namespace App\Facade\GeolocationFacade;

use Illuminate\Support\Facades\Facade;

class PevGeolocationCountryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevGeolocationCountryClass';
    }
}