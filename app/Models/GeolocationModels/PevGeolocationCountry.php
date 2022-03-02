<?php

namespace App\Models\GeolocationModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevGeolocationCountry extends Model
{
    use HasFactory;

    protected $table = 'pev_geolocation_countries';

    protected $fillable = [
        'pev_country_id',
        'ipfrom',
        'ipto',
        'deleted',
    ];

    public function Country()
    {
        return $this->belongsTo('App\Models\ZonePaisProvinciaModels\PevCountry', 'pev_country_id');
    }
}
