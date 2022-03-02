<?php

namespace App\Classes\BlogClass;

use App\Models\BlogModels\PevBlogPost;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevBlogPostClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevBlogPost;
    }
}