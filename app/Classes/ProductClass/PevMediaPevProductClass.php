<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevMediaPevProduct;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevMediaPevProductClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevMediaPevProduct;
    }

    public function insertAll($data)
    {
        $cant = sizeof($data['pev_media_id']);
        for ($i=0; $i < $cant; $i++) { 

            $datos = [
                "pev_media_id" => $data['pev_media_id'][$i],
                "pev_product_id" => $data['pev_product_id'],
                "principal" =>  $principal = $i == '0' ? '1' : '0',
            ];
            $resp[$i] = PevMediaPevProduct::create($datos);
        }

        return $resp;
    }
}