<?php

namespace App\Facade\FaqFacade;

use Illuminate\Support\Facades\Facade;

class PevFaqCategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevFaqCategoryClass';
    }
}
