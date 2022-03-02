<?php

namespace App\Facade\ZonePaisProvinciaFacade;

use Illuminate\Support\Facades\Facade;

class PevCountryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCountryClass';
    }
}