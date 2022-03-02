<?php

namespace App\Facade\ZonePaisProvinciaFacade;

use Illuminate\Support\Facades\Facade;

class PevStateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevStateClass';
    }
}