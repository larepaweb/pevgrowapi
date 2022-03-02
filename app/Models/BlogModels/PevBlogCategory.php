<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogCategory extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_categories';

    protected $fillable = [
        'active',
        'position',
        'deleted',
    ];

    public function BlogCategoryLang()
    {
        return $this->hasMany(PevBlogCategoryLang::class, 'pev_blog_category_id');
    }
}
