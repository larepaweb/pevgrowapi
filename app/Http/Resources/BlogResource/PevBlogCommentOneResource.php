<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\BlogFacade\PevBlogCommentFacade;

class PevBlogCommentOneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [
            'deleted' => $this->deleted,
        ];
       $resp = PevBlogCommentFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'pev_blog_category_id' => $this->pev_blog_category_id,
                'pev_customer_id' => $this->pev_customer_id,
                'pev_blog_comment_id_parent' => $this->pev_blog_comment_id_parent,
                'name' => $this->name,
                'email' => $this->email,
                'image' => $this->image,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'blog_comment_lang' => PevBlogCommentLangResource::Collection($this->BlogCommentLang), //->where('pev_lang_id', 1)->all()
            ];
        }else {
            return $resp;
        }
    }
}
