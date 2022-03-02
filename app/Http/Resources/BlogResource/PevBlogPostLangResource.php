<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevBlogPostLangResource extends JsonResource
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
            'pev_blog_post_id' => $this->pev_blog_post_id,
            'pev_lang_id' => $this->pev_lang_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'name' => $this->name,
            'text' => $this->text,
            'richsnippet' => $this->richsnippet,
            'image' => $this->image,
            'url' => $this->url,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'noindex' => $this->noindex,
            'active_lang' => $this->active_lang,
            'date_publish' => $this->date_publish,
            'pev_admin_id' => $this->BlogPost->pev_admin_id,
            'active' => $this->BlogPost->active,
            'deleted' => $this->BlogPost->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
