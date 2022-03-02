<?php

namespace App\Models\LangModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevLang extends Model
{
    use HasFactory;

    protected $table = 'pev_langs';

    protected $fillable = [
        'name',
        'active',
        'language_code',
        'locale',
        'date_format_lite',
        'date_format_full',
        'iso_code',
        'is_rtl',
    ];
}
