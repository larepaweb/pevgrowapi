<?php

namespace App\Facade\CustomerFacade;

use Illuminate\Support\Facades\Facade;

class PevAddressFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevAddressClass';
    }
}