<?php

namespace App\Models\ZonePaisProvinciaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCountry extends Model
{
    use HasFactory; 

    protected $table = 'pev_countries';

    protected $fillable = [
        'pev_zone_id',
        'pev_currency_id',
        'iso_code',
        'call_prefix',
        'active',
        'contains_states',
        'need_identification_number',
        'need_zip_code',
        'zip_code_format',
        'display_tax_label',
        'deleted'
    ];

    public function CountryLang()
    {
        return $this->hasMany(PevCountryLang::class, 'pev_country_id');
    }
}
