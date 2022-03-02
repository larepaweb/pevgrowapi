<?php

namespace App\Facade\HomePersonalizadaFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogPostVisitedFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogPostVisitedClass';
    }
}