<?php

namespace App\Facade\FaqFacade;

use Illuminate\Support\Facades\Facade;

class PevFaqFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevFaqClass';
    }
}
