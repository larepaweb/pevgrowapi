<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevMediaPevProductAttributePriceResource extends JsonResource
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
            'pev_media_id' => $this->pev_media_id,
            'url' => explode(",", $this->Media->url),
            'pev_product_attribute_price_id' => $this->pev_att_price_id,
            // 'product_name' => $this->Product->ProductLang[0]->name,
            'principal' => $this->principal,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
        ];
    }
}
