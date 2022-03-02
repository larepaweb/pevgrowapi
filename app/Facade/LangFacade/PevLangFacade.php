<?php

namespace App\Facade\LangFacade;

use Illuminate\Support\Facades\Facade;

class PevLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevLangClass';
    }
}
