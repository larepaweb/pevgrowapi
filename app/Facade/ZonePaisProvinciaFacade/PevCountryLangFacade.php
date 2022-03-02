<?php

namespace App\Facade\ZonePaisProvinciaFacade;

use Illuminate\Support\Facades\Facade;

class PevCountryLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCountryLangClass';
    }
}