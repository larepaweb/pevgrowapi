<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductCategoryFacade;

class PevProductCategoryOneResource extends JsonResource
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
       $resp = PevProductCategoryFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'pev_product_category_id_parent' => $this->pev_product_category_id_parent,
                'active' => $this->active,
                'important' => $this->important,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'category_lang' => $this->CategoryLang,

            ];
        }else{
            return $resp;
        }
    }
}
