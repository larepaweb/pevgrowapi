<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductAttributeFacade;

class PevProductAttributeOneResource extends JsonResource
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
       $resp = PevProductAttributeFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'pev_prod_att_group_id' => $this->pev_prod_att_group_id,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'attribute_group' => PevProductAttributeGroupLangResource::collection($this->AttributeGroup->AttributeGroupLang),
                'product_attribute_lang' => PevProductAttributeLangResource::collection($this->AttributeLang),
            ];
        }else {
            return $resp;
        }
    }
}
