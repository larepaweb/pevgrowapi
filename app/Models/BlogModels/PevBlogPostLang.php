<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogPostLang extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_post_langs';

    protected $fillable = [
        'pev_blog_post_id',
        'pev_lang_id',
        'name',
        'text',
        'richsnippet',
        'image',
        'url',
        'meta_title',
        'meta_description',
        'noindex',
        'active_lang',
        'date_publish',

    ];

    public function BlogPost()
    {
        return $this->belongsTo(PevBlogPost::class, 'pev_blog_post_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
