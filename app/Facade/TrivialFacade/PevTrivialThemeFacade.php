<?php

namespace App\Facade\TrivialFacade;

use Illuminate\Support\Facades\Facade;

class PevTrivialThemeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevTrivialThemeClass';
    }
}