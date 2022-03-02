<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductAttributePriceFacade;
use App\Http\Resources\ProductResource\PevProductAttributePriceResource;
use App\Http\Resources\ProductResource\PevProductAttributePriceResourceCollection;

class PevProductAttributePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductAttributePriceResourceCollection(PevProductAttributePriceFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $cant_data = sizeof($data);//obtengo la cantida de product_arrtibute_price creados por el usuairo
 
        for ($i=0; $i < $cant_data; $i++) { 
            $resp[$i] = new PevProductAttributePriceResource(PevProductAttributePriceFacade::create($data[$i])); // se crean los pev_product_attribute_price

            $cant_attributos = sizeof($data[$i]['pev_product_attribute_id']);

            for ($y=0; $y < $cant_attributos; $y++) { 
                $attribute_combination = $resp[$i]->AttributesCombination()->attach($data[$i]['pev_product_attribute_id'][$y]);//insercion en la tabla pivote todos los attributes q contiene el producto.
            }
        }
        

        return [
            'status' => true,
            'msg' => 'Product Attribute Price, registrados Correctamente.',
            'data' => $resp,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PevProductAttributePriceResource(PevProductAttributePriceFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $objeto = PevProductAttributePriceFacade::find($id);
        $resp = new PevProductAttributePriceResource(PevProductAttributePriceFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute Price, actualizado Correctamente.',
            'data' => $resp, //->response()->setStatusCode(Response::HTTP_CREATED),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = PevProductAttributePriceFacade::find($id);
        $resp = new PevProductAttributePriceResource(PevProductAttributePriceFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Attribute Price eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
