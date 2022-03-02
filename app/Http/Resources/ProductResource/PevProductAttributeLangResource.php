<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevProductAttributeLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pev_product_attribute_id' => $this->pev_product_attribute_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'name' => $this->name,
            'pev_prod_att_group_id' => $this->Attribute->pev_prod_att_group_id,
            'position' => $this->Attribute->position,
            'deleted' => $this->Attribute->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
