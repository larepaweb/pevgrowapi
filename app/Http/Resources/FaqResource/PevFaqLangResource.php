<?php

namespace App\Http\Resources\FaqResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevFaqLangResource extends JsonResource
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
            'pev_faq_id' => $this->pev_faq_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'question' => $this->question,
            'answer' => $this->answer,
            'position' => $this->Faq->position,
            'active' => $this->Faq->active,
            'deleted' => $this->Faq->deleted,
            'pev_faq_category_id' => $this->Faq->pev_faq_category_id,
            'active_lang' => $this->active_lang,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            // 'more' => $this->Faq->FaqCategory,
        ];
    }
}
