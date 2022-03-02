<?php

namespace App\Models\HomePersonalizadaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCategoryVisited extends Model
{
    use HasFactory;

    protected $table = 'pev_category_visiteds';

    protected $fillable = [
        'pev_customer_id',
        'pev_category_id',
        'visited_num',
        'date_last_visited',
        'deleted',
    ];
}
