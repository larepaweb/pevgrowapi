<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductCommentLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_comment_langs';

    protected $fillable = [
        'pev_product_comment_id',
        'pev_lang_id',
        'name',
        'email',
        'title',
        'content',
        'respond',
        'active_lang',
    ];

    public function ProductComment()
    {
        return $this->belongsTo(PevProductComment::class, 'pev_product_comment_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
