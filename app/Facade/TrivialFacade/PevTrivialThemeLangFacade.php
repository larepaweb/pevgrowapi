<?php

namespace App\Facade\TrivialFacade;

use Illuminate\Support\Facades\Facade;

class PevTrivialThemeLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevTrivialThemeLangClass';
    }
}