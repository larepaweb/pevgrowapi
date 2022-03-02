<?php

namespace App\Http\Resources\CMSResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PevCMSResourceCollection extends ResourceCollection
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
