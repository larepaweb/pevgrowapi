<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductAttributeGroupFacade;
use App\Http\Resources\ProductResource\PevProductAttributeGroupResource;
use App\Http\Resources\ProductResource\PevProductAttributeGroupResourceCollection;
use App\Http\Resources\ProductResource\PevProductAttributeGroupOneResource;
use App\Http\Resources\ProductResource\PevProductAttributeGroupOneResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductAttributeGroupRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductAttributeGroupRequest;

class PevProductAttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductAttributeGroupResourceCollection(PevProductAttributeGroupFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductAttributeGroupRequest $request)
    {
        $data = $request->validated();
        $resp = new PevProductAttributeGroupResource(PevProductAttributeGroupFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Product Attribute Group, registrado Correctamente.',
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
        return new PevProductAttributeGroupOneResource(PevProductAttributeGroupFacade::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductAttributeGroupRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevProductAttributeGroupFacade::find($id);
        $resp = new PevProductAttributeGroupResource(PevProductAttributeGroupFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute Group, actualizado Correctamente.',
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
        $objeto = PevProductAttributeGroupFacade::find($id);
        $resp = new PevProductAttributeGroupResource(PevProductAttributeGroupFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Attribute Group, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
