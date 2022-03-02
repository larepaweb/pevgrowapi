<?php

namespace App\Models\FaqModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevFaqLang extends Model
{
    use HasFactory;

    protected $table = 'pev_faq_langs';

    protected $fillable = [
        'pev_faq_id',
        'pev_lang_id',
        'question',
        'answer',
        'active_lang',
    ];
    public function Faq()
    {
        return $this->belongsTo('App\Models\FaqModels\PevFaq', 'pev_faq_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
