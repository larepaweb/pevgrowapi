<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogCategoryLang extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_category_langs';

    protected $fillable = [
        'pev_lang_id',
        'pev_blog_category_id',
        'name',
        'text',
        'url',
        'meta_title',
        'meta_description',
        'noindex',
        'active_lang',
    ];

    public function BlogCategory()
    {
        return $this->belongsTo(PevBlogCategory::class, 'pev_blog_category_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
