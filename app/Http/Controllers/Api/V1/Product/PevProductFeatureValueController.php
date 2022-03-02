<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductFeatureValueFacade;
use App\Http\Resources\ProductResource\PevProductFeatureValueResource;
use App\Http\Resources\ProductResource\PevProductFeatureValueResourceCollection;
use App\Http\Resources\ProductResource\PevProductFeatureValueOneResource;
use App\Http\Resources\ProductResource\PevProductFeatureValueOneResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductFeatureValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductFeatureValueResourceCollection(PevProductFeatureValueFacade::findAllPageFilter());
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
        $resp = new PevProductFeatureValueResource(PevProductFeatureValueFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Product Attribute, registrado Correctamente.',
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
        return new PevProductFeatureValueOneResource(PevProductFeatureValueFacade::find($id));

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
        $objeto = PevProductFeatureValueFacade::find($id);
        $resp = new PevProductFeatureValueResource(PevProductFeatureValueFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute, actualizado Correctamente.',
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
        $objeto = PevProductFeatureValueFacade::find($id);
        $resp = new PevProductFeatureValueResource(PevProductFeatureValueFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Attribute, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
