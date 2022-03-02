<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\BlogFacade\PevBlogPostFacade;

class PevBlogPostOneResource extends JsonResource
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
       $resp = PevBlogPostFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'pev_blog_category_id' => $this->Categories,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'blog_post_lang' => PevBlogPostLangResource::Collection($this->BlogPostLang),

            ];
        }else {
            return $resp;
        }
    }
}
