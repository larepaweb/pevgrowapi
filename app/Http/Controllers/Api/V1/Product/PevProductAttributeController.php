<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductAttributeFacade;
use App\Http\Resources\ProductResource\PevProductAttributeResource;
use App\Http\Resources\ProductResource\PevProductAttributeResourceCollection;
use App\Http\Resources\ProductResource\PevProductAttributeOneResource;
use App\Http\Resources\ProductResource\PevProductAttributeOneResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductAttributeRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductAttributeRequest;

class PevProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductAttributeResourceCollection(PevProductAttributeFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductAttributeRequest $request)
    {
        $data = $request->all();
        $resp = new PevProductAttributeResource(PevProductAttributeFacade::create($data));

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
        return new PevProductAttributeOneResource(PevProductAttributeFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductAttributeRequest $request, $id)
    {
        $data = $request->all();
        $objeto = PevProductAttributeFacade::find($id);
        $resp = new PevProductAttributeResource(PevProductAttributeFacade::update($objeto, $data));

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
        $objeto = PevProductAttributeFacade::find($id);
        $resp = new PevProductAttributeResource(PevProductAttributeFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Attribute, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
