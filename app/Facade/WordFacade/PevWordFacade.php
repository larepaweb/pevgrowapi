<?php

namespace App\Facade\WordFacade;

use Illuminate\Support\Facades\Facade;

class PevWordFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevWordClass';
    }
}