<?php

namespace App\Models\TrivialModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevTrivialTheme extends Model
{
    protected $table = 'pev_trivial_themes';

    protected $fillable = [
        'active',
        'deleted',
    ];

    public function TrivialThemeLang()
    {
        return $this->hasMany(PevTrivialThemeLang::class, 'pev_trivial_theme_id');
    }

    public function TrivialQuestion()
    {
        return $this->hasMany(PevTrivialQuestion::class, 'pev_trivial_theme_id');
    }


    public function TrivialQuestionLang()
    {
        return $this->hasManyThrough(PevTrivialQuestionLang::class, PevTrivialQuestion::class, 'pev_trivial_theme_id', 'pev_trivial_question_id');
    }
}
