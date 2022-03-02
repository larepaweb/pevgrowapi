<?php

namespace App\Models\BlogModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevBlogCommentLang extends Model
{
    use HasFactory;

    protected $table = 'pev_blog_comment_langs';

    protected $fillable = [
        'pev_blog_comment_id',
        'pev_lang_id',
        'comment',
        'reviewed',
        'active_lang',
    ];

    public function BlogComment()
    {
        return $this->belongsTo(PevBlogComment::class, 'pev_blog_comment_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
