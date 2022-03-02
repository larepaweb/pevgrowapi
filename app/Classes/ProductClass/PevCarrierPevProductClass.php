<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevCarrierPevProduct;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCarrierPevProductClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrierPevProduct;
    }
    
    public function insertAll($data)
    {
        // $position = PevCarrierPevProduct::all()->count();
        $cant = sizeof($data['pev_carrier_id']);
        for ($i=0; $i < $cant; $i++) { 

            $datos = [
                "pev_carrier_id" => $data['pev_carrier_id'][$i],
                "pev_product_id" => $data['pev_product_id'],
                // "position" =>  $position+1+$i,
            ];
            $resp[$i] = PevCarrierPevProduct::create($datos);
        }

        return $resp;
    }
}