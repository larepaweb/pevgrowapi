<?php

namespace App\Models\EkomiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevEkomiOrder extends Model
{
    use HasFactory;

    protected $table = 'pev_ekomi_orders';

    protected $fillable = [
        'status',
        'date',
        'detail',
        'response',
        'deleted',
    ];
}
