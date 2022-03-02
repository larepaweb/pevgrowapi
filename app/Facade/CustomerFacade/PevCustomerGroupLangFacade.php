<?php

namespace App\Facade\CustomerFacade;

use Illuminate\Support\Facades\Facade;

class PevCustomerGroupLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCustomerGroupLangClass';
    }
}