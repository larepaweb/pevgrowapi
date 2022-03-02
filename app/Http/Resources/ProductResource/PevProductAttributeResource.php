<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductAttributeFacade;

class PevProductAttributeResource extends JsonResource
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
                'value' => $this->id,
                'pev_prod_att_group_id' => $this->pev_prod_att_group_id,
                'lable' => $action = ($this->AttributeLang->where('pev_lang_id', 1)->toArray() == null) ? 'SIN NOMBRE' : $this->AttributeLang->where('pev_lang_id', 1)->toArray()[0]['name'],

               // 'lable' => $this->AttributeLang
                // 'position' => $this->position,
                // 'deleted' => $this->deleted,
                // 'created_at' => $this->created_at->format('d-m-Y'),
                // 'updated_at' => $this->updated_at->format('d-m-Y'),
                //'attribute_group' => PevProductAttributeGroupLangResource::collection($this->AttributeGroup->AttributeGroupLang),
            ];
        }else {
            return $resp;
        }
    }
}
