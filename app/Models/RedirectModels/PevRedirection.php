<?php

namespace App\Models\RedirectModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevRedirection extends Model
{
    use HasFactory;

    protected $table = 'pev_redirections';

    protected $fillable = [
        'url_old',
        'url_new',
        'redirect_type',
        'seedfinder',
        'deleted',
    ];
}
