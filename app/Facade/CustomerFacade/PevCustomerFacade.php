<?php

namespace App\Facade\CustomerFacade;

use Illuminate\Support\Facades\Facade;

class PevCustomerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCustomerClass';
    }
}