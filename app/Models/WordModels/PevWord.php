<?php

namespace App\Models\WordModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevWord extends Model
{
    use HasFactory;

    protected $table = 'pev_words';

    protected $fillable = [
        'new',
        'active',
        'deleted',
    ];

    public function WordLang()
    {
        return $this->hasMany('App\Models\WordModels\PevWordLang', 'pev_word_id');
    }
}
