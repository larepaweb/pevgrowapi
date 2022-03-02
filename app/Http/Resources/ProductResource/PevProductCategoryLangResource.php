<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevProductCategoryLangResource extends JsonResource
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
            'pev_product_category_id_parent' => $this->ProductCategory->pev_product_category_id_parent,
            'pev_product_category_id' => $this->pev_product_category_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'name' => $this->name,
            'text_short' => $this->text_short,
            'text' => $this->text,
            'url' => $this->url,
            'image' => $this->image,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'noindex' => $this->noindex,
            'active_lang' => $this->active_lang,
            'important' => $this->ProductCategory->important,
            'position' => $this->ProductCategory->position,
            'deleted' => $this->ProductCategory->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
