<?php

namespace App\Models\TrivialModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevTrivialQuestionLang extends Model
{
    use HasFactory;

    protected $table = 'pev_trivial_question_langs';

    protected $fillable = [
        'pev_trivial_question_id',
        'pev_lang_id',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'active_lang',

    ];

    public function TrivialQuestion()
    {
        return $this->belongsTo(PevTrivialQuestion::class, 'pev_trivial_question_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
