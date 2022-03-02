<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevProductCategoryCommentLangResource extends JsonResource
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
            'pev_prodcatcomment_id' => $this->pev_prodcatcomment_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'pev_customer_id' => $this->pev_customer_id,
            'name' => $this->name,
            'email' => $this->email,
            'title' => $this->title,
            'content' => $this->content,
            'respond' => $this->respond,
            'active_lang' => $this->active_lang,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
