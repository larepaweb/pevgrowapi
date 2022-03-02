<?php

namespace App\Models\ZonePaisProvinciaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevZone extends Model
{
    use HasFactory; 

    protected $table = 'pev_zones';

    protected $fillable = [
        'name',
        'active',
        'deleted'
    ];

}
