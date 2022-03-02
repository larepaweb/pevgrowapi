<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductLang extends Model
{
    use HasFactory; 										

    protected $table = 'pev_product_langs';

    protected $fillable = [
        'pev_product_id',
        'pev_lang_id',
        'name',
        'text_intro',
        'text_short',
        'text',
        'video',
        'url',
        'meta_title',
        'meta_description',
        'active_lang',
    ];

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
