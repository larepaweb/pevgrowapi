<?php

namespace App\Facade\RedirectionFacade;

use Illuminate\Support\Facades\Facade;

class PevRedirectionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevRedirectionClass';
    }
}