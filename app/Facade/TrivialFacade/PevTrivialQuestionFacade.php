<?php

namespace App\Facade\TrivialFacade;

use Illuminate\Support\Facades\Facade;

class PevTrivialQuestionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevTrivialQuestionClass';
    }
}