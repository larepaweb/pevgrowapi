<?php

namespace App\Http\Resources\EkomiResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\EkomiFacade\PevEkomiOrderFacade;

class PevEkomiOrderResource extends JsonResource
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
       $resp = PevEkomiOrderFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'status' => $this->status,
                'date' => $this->date,
                'detail' => $this->detail,
                'deleted' => $this->deleted,
                'response' => $this->response,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                // 'more' => $this->FaqLang,
            ];
        }else {
            return $resp;
        }
    }
}
