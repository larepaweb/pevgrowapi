<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductCategoryCommentLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_category_comment_langs';

    protected $fillable = [

        'pev_prodcatcomment_id',
        'pev_lang_id',
        'pev_customer_id',
        'name',
        'email',
        'title',
        'content',
        'respond',
        'active_lang'
    ];

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
