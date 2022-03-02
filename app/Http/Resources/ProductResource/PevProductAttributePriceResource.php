<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductAttributePriceFacade;

class PevProductAttributePriceResource extends JsonResource
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
       $resp = PevProductAttributePriceFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'pev_product_id' => $this->pev_product_id,
                'reference' => $this->reference,
                'ean13' => $this->ean13,
                'isbn' => $this->isbn,
                'upc' => $this->upc,
                'price' => $this->price,
                'ecotax' => $this->ecotax,
                'quantity' => $this->quantity,
                'weight' => $this->weight,
                'unit_price_impact' => $this->unit_price_impact,
                'minimal_quantity' => $this->minimal_quantity,
                'default_on' => $this->default_on,
                'available_date' => $this->available_date,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'attribute_combinations' => $this->AttributesCombination,
                // 'attribute_group_lang' => PevProductAttributeGroupLangResource::collection($this->AttributeGroupLang),
            ];
        }else {
            return $resp;
        }
    }
}
