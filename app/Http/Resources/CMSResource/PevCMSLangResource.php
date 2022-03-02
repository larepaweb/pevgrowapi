<?php

namespace App\Http\Resources\CMSResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevCMSLangResource extends JsonResource
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
            'pev_cms_id' => $this->pev_cms_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'title' => $this->title,
            'text' => $this->text,
            'url' => $this->url,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'noindex' => $this->noindex,
            'active_lang' => $this->active_lang,
            'position' => $this->Cms->position,
            'active' => $this->Cms->active,
            'deleted' => $this->Cms->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            // 'more' => $this->FaqLang,
        ];
    }
}
