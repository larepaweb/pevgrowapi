<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductCategoryCommentFacade;

class PevProductCategoryCommentOneResource extends JsonResource
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
       $resp = PevProductCategoryCommentFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'pev_product_category_id' => $this->pev_product_category_id,
                //'product_categoy' => $this->ProductCategory,
                'pev_customer_id' => $this->pev_customer_id,
                'type' => $this->type,
                'grade' => $this->grade,
                'image' => $this->image,
                'active' => $this->active,
                'ip' => $this->ip,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'comment_lang' => $this->CategoryCommentLang,
            ];
        }else {
            return $resp;
        }
    }
}
