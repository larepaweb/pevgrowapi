<?php

namespace App\Facade\CacheCssJsFacade;

use Illuminate\Support\Facades\Facade;

class PevCacheCssJsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCacheCssJsClass';
    }
}
