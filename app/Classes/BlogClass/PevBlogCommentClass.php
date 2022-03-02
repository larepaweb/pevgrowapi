<?php

namespace App\Classes\BlogClass;

use App\Models\BlogModels\PevBlogComment;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevBlogCommentClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevBlogComment;
    }
}