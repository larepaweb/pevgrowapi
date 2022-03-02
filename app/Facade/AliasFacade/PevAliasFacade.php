<?php

namespace App\Facade\AliasFacade;

use Illuminate\Support\Facades\Facade;

class PevAliasFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevAliasClass';
    }
}