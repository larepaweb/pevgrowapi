<?php

namespace App\Models\FaqModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevFaqCategory extends Model
{
    use HasFactory;

    protected $table = 'pev_faq_categories';

    protected $fillable = [
        'active',
        'position',
        'deleted',
    ];

    public function FaqCategoryLang()
    {
        return $this->hasMany('App\Models\FaqModels\PevFaqCategoryLang', 'pev_faqcategory_id');
    }

    public function Faq()
    {
        return $this->hasMany('App\Models\FaqModels\PevFaq');
    }

    public function FaqLang()
    {
        return $this->hasManyThrough('App\Models\FaqModels\PevFaqLang', 'App\Models\FaqModels\PevFaq', 'pev_faq_category_id', 'pev_faq_id');
    }
}
