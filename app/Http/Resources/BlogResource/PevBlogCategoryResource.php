<?php

namespace App\Http\Resources\BlogResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\BlogFacade\PevBlogCategoryFacade;

class PevBlogCategoryResource extends JsonResource
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
       $resp = PevBlogCategoryFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'active' => $this->active,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'), 
                //'blog_category_lang' => PevBlogCategoryLangResource::Collection($this->BlogCategoryLang),
            ];
        }else {
           return $resp;
        }
    }
}
