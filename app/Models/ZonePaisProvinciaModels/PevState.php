<?php

namespace App\Models\ZonePaisProvinciaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevState extends Model
{
    use HasFactory;

    protected $table = 'pev_states';

    protected $fillable = [
        'pev_zone_id',
        'pev_country_id',
        'iso_code',
        'name',
        'active',
        'deleted',
    ];
    public function Zone()
    {
        return $this->belongsTo(PevZone::class, 'pev_zone_id');
    }
    public function Country()
    {
        return $this->belongsTo(PevCountry::class, 'pev_country_id');
    }

    // public function CountryLang()
    // {
    //     return $this->hasMany(PevCountryLang::class, 'pev_country_id');
    // }
}
