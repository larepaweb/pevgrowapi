<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductAttributeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductAttributeClass';
    }
}