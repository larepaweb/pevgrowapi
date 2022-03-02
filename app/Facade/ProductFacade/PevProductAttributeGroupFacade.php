<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductAttributeGroupFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductAttributeGroupClass';
    }
}