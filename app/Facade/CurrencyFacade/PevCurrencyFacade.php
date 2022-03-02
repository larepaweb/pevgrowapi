<?php

namespace App\Facade\CurrencyFacade;

use Illuminate\Support\Facades\Facade;

class PevCurrencyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCurrencyClass';
    }
}