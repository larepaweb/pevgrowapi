<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogPost extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_posts';

    protected $fillable = [
        'pev_admin_id',
        'active',
        'deleted',
    ];

    public function Categories()
    {
        return $this->belongsToMany(PevBlogCategory::class, 'pev_blog_category_pev_blog_post', 'pev_blop_post_id', 'pev_blog_category_id');
    }

    public function BlogPostLang()
    {
        return $this->hasMany(PevBlogPostLang::class, 'pev_blog_post_id');
    }
}
