<?php

namespace App\Facade\CMSFacade;

use Illuminate\Support\Facades\Facade;

class PevCMSLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCMSLangClass';
    }
}