<?php

namespace App\Facade\CustomerFacade;

use Illuminate\Support\Facades\Facade;

class PevCustomerGroupFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCustomerGroupClass';
    }
}