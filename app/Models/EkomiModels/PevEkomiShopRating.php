<?php

namespace App\Models\EkomiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevEkomiShopRating extends Model
{
    use HasFactory;

    protected $table = 'pev_ekomi_shop_ratings';

    protected $fillable = [
        'pev_lang_id',
        'number_of_ratings',
        'exact_average',
        'rounded_average',
        'seal',
        'deleted',
    ];
}
