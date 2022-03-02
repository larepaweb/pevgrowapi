<?php

namespace App\Facade\HomePersonalizadaFacade;

use Illuminate\Support\Facades\Facade;

class PevProductVisitedFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductVisitedClass';
    }
}