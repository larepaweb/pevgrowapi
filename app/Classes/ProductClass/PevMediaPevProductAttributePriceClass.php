<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevMediaPevProductAttributePrice;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevMediaPevProductAttributePriceClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevMediaPevProductAttributePrice;
    }

    public function insertAll($data)
    {
        $cant = sizeof($data['pev_media_id']);
        for ($i=0; $i < $cant; $i++) { 

            $datos = [
                "pev_media_id" => $data['pev_media_id'][$i],
                "pev_att_price_id" => $data['pev_att_price_id'],
                "principal" =>  $principal = $i == '0' ? '1' : '0',
            ];
            $resp[$i] = PevMediaPevProductAttributePrice::create($datos);
        }

        return $resp;
    }
}