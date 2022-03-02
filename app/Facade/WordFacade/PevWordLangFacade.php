<?php

namespace App\Facade\WordFacade;

use Illuminate\Support\Facades\Facade;

class PevWordLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevWordLangClass';
    }
}