<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevBlogCategoryLangResource extends JsonResource
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
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'pev_blog_category_id' => $this->pev_blog_category_id,
            'name' => $this->name,
            'text' => $this->text,
            'url' => $this->url,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'noindex' => $this->noindex,
            'active_lang' => $this->active_lang,
            'position' => $this->BlogCategory->position,
            'active' => $this->BlogCategory->active,
            'deleted' => $this->BlogCategory->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
