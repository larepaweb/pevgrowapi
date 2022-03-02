<?php

namespace App\Http\Resources\CacheCssJs;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CacheCssJsResourceCollection extends ResourceCollection
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
