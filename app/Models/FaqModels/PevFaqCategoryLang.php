<?php

namespace App\Models\FaqModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevFaqCategoryLang extends Model
{
    use HasFactory;

    protected $table = 'pev_faq_category_langs';

    protected $fillable = [
        'pev_lang_id',
        'pev_faqcategory_id',
        'name',
        'text',
        'active_lang',
    ];


    public function FaqCategory()
    {
        return $this->belongsTo('App\Models\FaqModels\PevFaqCategory', 'pev_faqcategory_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }

    // public function Faq()
    // {
    //     return $this->hasMany('App\Models\FaqModels\PevFaq', 'pev_faq_category_id');
    // }

    // public function FaqLang()
    // {
    //     return $this->hasManyThrough(PevFaqLang::class, PevFaq::class, 'pev_faq_category_id', 'pev_faq_id');
    // }

    
}
