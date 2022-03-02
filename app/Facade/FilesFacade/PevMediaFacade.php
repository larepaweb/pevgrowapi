<?php

namespace App\Facade\FilesFacade;

use Illuminate\Support\Facades\Facade;

class PevMediaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevMediaClass';
    }
}
