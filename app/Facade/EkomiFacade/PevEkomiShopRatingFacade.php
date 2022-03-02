<?php

namespace App\Facade\EkomiFacade;

use Illuminate\Support\Facades\Facade;

class PevEkomiShopRatingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevEkomiShopRatingClass';
    }
}