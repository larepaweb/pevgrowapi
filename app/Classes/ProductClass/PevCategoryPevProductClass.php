<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevCategoryPevProduct;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCategoryPevProductClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCategoryPevProduct;
    }
    
    public function insertAll($data)
    {
        $position = PevCategoryPevProduct::all()->count();
        $cant = sizeof($data['pev_category_id']);
        for ($i=0; $i < $cant; $i++) { 

            $datos = [
                "pev_category_id" => $data['pev_category_id'][$i],
                "pev_product_id" => $data['pev_product_id'],
                "position" =>  $position+1+$i,
            ];
            $resp[$i] = PevCategoryPevProduct::create($datos);
        }

        return $resp;
    }
}