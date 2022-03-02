<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductFacade;

class PevProductOneResource extends JsonResource
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
       $resp = PevProductFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_product_category_id' => $this->pev_product_category_id,
                'pev_tax_rule_group_id' => $this->pev_tax_rule_group_id,
                'ean13' => $this->ean13,
                'isbn' => $this->isbn,
                'upc' => $this->upc,
                'price' => $this->price,
                'reference' => $this->reference,
                'width' => $this->width,
                'height' => $this->height,
                'depth' => $this->depth,
                'weight' => $this->weight,
                'active' => $this->active,
                'available_for_order' => $this->available_for_order,
                'show_price' => $this->show_price,
                'description_num_columns' => $this->description_num_columns,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                'product_lang' => PevProductLangResource::collection($this->ProductLang),
            ];
        }else {
            return $resp;
        }
    }
}
