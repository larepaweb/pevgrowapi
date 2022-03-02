<?php

namespace App\Facade\CMSFacade;

use Illuminate\Support\Facades\Facade;

class PevCMSFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCMSClass';
    }
}