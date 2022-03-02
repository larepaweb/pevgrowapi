<?php

namespace App\Http\Resources\TrivialResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevTrivialQuestionLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pev_trivial_question_id' => $this->pev_trivial_question_id,
            'pev_lang_id' => $this->pev_lang_id,
            'question' => $this->question,
            'answer1' => $this->answer1,
            'answer2' => $this->answer2,
            'answer3' => $this->answer3,
            'answer4' => $this->answer4,
            'active_lang' => $this->active_lang,
            'deleted' => $this->TrivialQuestion->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
        ];

    }
}
