<?php

namespace App\Http\Resources\CarrierResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PevCarrierRangeWeightResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
