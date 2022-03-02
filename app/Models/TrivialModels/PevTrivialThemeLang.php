<?php

namespace App\Models\TrivialModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevTrivialThemeLang extends Model
{
    use HasFactory;

    protected $table = 'pev_trivial_theme_langs';

    protected $fillable = [
        'pev_trivial_theme_id',
        'pev_lang_id',
        'name',
        'active_lang',
    ];

    public function TrivialTheme()
    {
        return $this->belongsTo(PevTrivialTheme::class, 'pev_trivial_theme_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
