<?php

namespace App\Facade\HomePersonalizadaFacade;

use Illuminate\Support\Facades\Facade;

class PevCategoryVisitedFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCategoryVisitedClass';
    }
}