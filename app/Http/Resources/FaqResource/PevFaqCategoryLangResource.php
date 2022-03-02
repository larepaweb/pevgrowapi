<?php

namespace App\Http\Resources\FaqResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\FaqModels\PevFaq;

class PevFaqCategoryLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //if($this->FaqCategory->deleted == 0){
            return [
                'id' => $this->id,
                'pev_lang_id' => $this->pev_lang_id,
                'iso_code' => strtoupper($this->PevLang->iso_code),
                'name_lang' => $this->PevLang->name,
                'pev_faq_category_id' => $this->pev_faqcategory_id,
                'name' => $this->name,
                'text' => $this->text,
                'position' => $this->FaqCategory->position,
                'active' => $this->FaqCategory->active,
                'deleted' => $this->FaqCategory->deleted,
                'active_lang' => $this->active_lang,
                'faq' => $this->Faq,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
            ];
        //}
    }
}
