<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevBlogCommentLangResource extends JsonResource
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
            'pev_blog_comment_id' => $this->pev_blog_comment_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'comment' => $this->comment,
            'reviewed' => $this->reviewed,
            'active_lang' => $this->active_lang,
            'deleted' => $this->BlogComment->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
