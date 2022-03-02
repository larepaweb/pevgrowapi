<?php

namespace App\Models\CurrencyModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCurrency extends Model
{
    use HasFactory;	

    protected $table = 'pev_currencies';

    protected $fillable = [
        'name',
        'iso_code',
        'conversion_rate',
        'active',
        'deleted'
    ];
}
