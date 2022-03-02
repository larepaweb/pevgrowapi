<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogComment extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_comments';

    protected $fillable = [
        'pev_blog_category_id',
        'pev_customer_id',
        'pev_blog_comment_id_parent',
        'name',
        'email',
        'image',
        'active',
        'deleted',
    ];

    public function BlogCommentLang()
    {
        return $this->hasMany(PevBlogCommentLang::class, 'pev_blog_comment_id');
    }
}
