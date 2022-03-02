<?php

namespace App\Models\TrivialModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevTrivialQuestion extends Model
{
    use HasFactory;

    protected $table = 'pev_trivial_questions';

    protected $fillable = [
        'pev_trivial_theme_id',
        'answer_true',
        'active',
        'deleted',
    ];

    public function TrivialQuestionLang()
    {
        return $this->hasMany(PevTrivialQuestionLang::class, 'pev_trivial_question_id');
    }

    public function TrivialTheme()
    {
        return $this->belongsTo(PevTrivialTheme::class, 'pev_trivial_theme_id');
    }

}
