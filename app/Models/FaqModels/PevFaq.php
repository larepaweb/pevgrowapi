<?php

namespace App\Models\FaqModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevFaq extends Model
{
    use HasFactory;

    protected $table = 'pev_faqs';

    protected $fillable = [
        'pev_faq_category_id',
        'active',
        'position',
        'deleted',
    ];

    public function FaqCategory()
    {
        return $this->belongsTo('App\Models\FaqModels\PevFaqCategory', 'pev_faq_category_id');
    }

    public function FaqLang()
    {
        return $this->hasMany('App\Models\FaqModels\PevFaqLang');
    }
}
