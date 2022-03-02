<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevMediaPevProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevMediaPevProductClass';
    }
}