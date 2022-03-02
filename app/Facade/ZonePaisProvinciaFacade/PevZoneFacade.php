<?php

namespace App\Facade\ZonePaisProvinciaFacade;

use Illuminate\Support\Facades\Facade;

class PevZoneFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevZoneClass';
    }
}