<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductCategoryFacade;

class PevProductCategoryTreeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $retorno = parent::toArray($request);
        //return $retorno['children'];
        $array = [
            'deleted' => $this->deleted,
        ];
       $resp = PevProductCategoryFacade::ValidarSQL($array);
        if($resp == null){

            try {
                $name = $this->CategoryLang[0]->name;
            } catch (\Throwable $th) {
                $name = "";
            }
            return [
                'id' => $this->id,
                //'pev_product_category_id_parent' => $this->pev_product_category_id_parent,
                'lable' => $name,
                //'children' => $retorno,
                // 'more' => $this->CategoryLang,

            ];
        }else {
            return $resp;
        }
    }
}
