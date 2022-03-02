<?php

namespace App\Models\CMSModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCmsLang extends Model
{
    use HasFactory;

    protected $table = 'pev_cms_langs';

    protected $fillable = [
        'pev_cms_id',
        'pev_lang_id',
        'title',
        'text',
        'url',
        'meta_title',
        'meta_description',
        'noindex',
        'active_lang',
    ];

    public function Cms()
    {
        return $this->belongsTo(PevCms::class, 'pev_cms_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
