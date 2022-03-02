<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductAttributeGroupFacade;

class PevProductAttributeGroupOneResource extends JsonResource
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
       $resp = PevProductAttributeGroupFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'is_color_group' => $this->is_color_group,
                'group_type' => $this->group_type,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'attribute_group_lang' => PevProductAttributeGroupLangResource::collection($this->AttributeGroupLang),
            ];
        }else {
            return $resp;
        }
    }
}
