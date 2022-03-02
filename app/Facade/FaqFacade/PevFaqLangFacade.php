<?php

namespace App\Facade\FaqFacade;

use Illuminate\Support\Facades\Facade;

class PevFaqLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevFaqLangClass';
    }
}
