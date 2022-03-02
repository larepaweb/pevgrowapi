<?php

namespace App\Http\Resources\CustomerResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CustomerFacade\PevCustomerGroupFacade;

class PevCustomerGroupOneResource extends JsonResource
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
       $resp = PevCustomerGroupFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                'group_lang' => $this->CustomerGroupLang,
            ];
        }else {
            return $resp;
        }
    }
}
