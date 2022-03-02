<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductFeatureFacade;
use App\Http\Resources\ProductResource\PevProductFeatureResource;
use App\Http\Resources\ProductResource\PevProductFeatureResourceCollection;
use App\Http\Resources\ProductResource\PevProductFeatureOneResource;
use App\Http\Resources\ProductResource\PevProductFeatureOneResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductFeatureResourceCollection(PevProductFeatureFacade::findAll()->where('deleted', 0));
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
        $resp = new PevProductFeatureResource(PevProductFeatureFacade::create($data));

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
        return new PevProductFeatureOneResource(PevProductFeatureFacade::find($id));
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
        $objeto = PevProductFeatureFacade::find($id);
        $resp = new PevProductFeatureResource(PevProductFeatureFacade::update($objeto, $data));

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
        $objeto = PevProductFeatureFacade::find($id);
        $resp = new PevProductFeatureResource(PevProductFeatureFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Attribute, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
