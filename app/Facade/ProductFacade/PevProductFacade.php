<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductClass';
    }
}