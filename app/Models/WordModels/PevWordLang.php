<?php

namespace App\Models\WordModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevWordLang extends Model
{
    use HasFactory;

    protected $table = 'pev_word_langs';

    protected $fillable = [
        'pev_word_id',
        'pev_lang_id',
        'word',
        'definition',
        'active_lang',
    ];

    public function Word()
    {
        return $this->belongsTo(PevWord::class, 'pev_word_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
