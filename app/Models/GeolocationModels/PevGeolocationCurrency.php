<?php

namespace App\Models\GeolocationModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevGeolocationCurrency extends Model
{
    use HasFactory;

    protected $table = 'pev_geolocation_currencies';

    protected $fillable = [
        'pev_country_id',
        'pev_currency_id',
        'deleted',
    ];




    // public function Product()
    // {
    //     return $this->belongsTo('App\Models\ProductModels\PevProduct', 'pev_product_id');
    // }
}
