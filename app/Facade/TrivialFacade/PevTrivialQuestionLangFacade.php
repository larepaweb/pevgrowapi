<?php

namespace App\Facade\TrivialFacade;

use Illuminate\Support\Facades\Facade;

class PevTrivialQuestionLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevTrivialQuestionLangClass';
    }
}