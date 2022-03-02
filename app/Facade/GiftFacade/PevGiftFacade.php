<?php

namespace App\Facade\GiftFacade;

use Illuminate\Support\Facades\Facade;

class PevGiftFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevGiftClass';
    }
}