<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductCategoryFacade;

class PevProductCategoryResource extends JsonResource
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
                'value' => $this->id,
                'pev_product_category_id_parent' => $this->pev_product_category_id_parent,
                'lable' => $action = ($this->CategoryLang->where('pev_lang_id', 1)->toArray() == null) ? 'SIN NOMBRE' : $this->CategoryLang->where('pev_lang_id', 1)->toArray()[0]['name'],
                'active' => $this->active,
                // 'important' => $this->important,
                // 'position' => $this->position,
                // 'deleted' => $this->deleted,
                // 'created_at' => $this->created_at->format('d-m-Y'),
                // 'updated_at' => $this->updated_at->format('d-m-Y'),
                // 'more' => $this->CategoryLang,

            ];
        }else {
            return $resp;
        }
    }
}
