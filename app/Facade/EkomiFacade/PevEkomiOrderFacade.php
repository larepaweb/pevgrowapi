<?php

namespace App\Facade\EkomiFacade;

use Illuminate\Support\Facades\Facade;

class PevEkomiOrderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevEkomiOrderClass';
    }
}