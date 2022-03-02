<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevFeatureValuePevProduct;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevFeatureValuePevProductClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevFeatureValuePevProduct;
    }
    
    public function insertAll($data)
    {
        // $position = PevFeatureValuePevProduct::all()->count();
        $cant = sizeof($data['pev_prod_feat_val_id']);
        for ($i=0; $i < $cant; $i++) { 

            $datos = [
                "pev_prod_feat_val_id" => $data['pev_prod_feat_val_id'][$i],
                "pev_product_id" => $data['pev_product_id'],
                // "position" =>  $position+1+$i,
            ];
            $resp[$i] = PevFeatureValuePevProduct::create($datos);
        }

        return $resp;
    }
}