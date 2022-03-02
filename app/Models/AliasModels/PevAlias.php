<?php

namespace App\Models\AliasModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevAlias extends Model
{
    use HasFactory; 		

    protected $table = 'pev_aliases';

    protected $fillable = [
        'alias',
        'search',
        'active',
        'deleted',
    ];

    // public function BlogCategoryLang()
    // {
    //     return $this->hasMany(PevBlogCategoryLang::class, 'pev_blog_category_id');
    // }
}
