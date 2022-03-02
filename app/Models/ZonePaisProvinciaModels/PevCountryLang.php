<?php

namespace App\Models\ZonePaisProvinciaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCountryLang extends Model
{
    use HasFactory;

    protected $table = 'pev_country_langs';

    protected $fillable = [
        'pev_country_id',
        'pev_lang_id',
        'name',
    ];

    public function Country()
    {
        return $this->belongsTo(PevCountry::class, 'pev_country_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
