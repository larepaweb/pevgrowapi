<?php

namespace App\Http\Resources\WordResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevWordLangResource extends JsonResource
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
            'pev_word_id' => $this->pev_word_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            "name_lang" => $this->PevLang->name,
            // 'first_lyrics' => substr($this->word, 0, 1),
            'word' => $this->word,
            'definition' => $this->definition,
            'active_lang' => $this->active_lang,
            'deleted' => $this->Word->deleted,
            'new' => $this->Word->new,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
        ];
    }
}
