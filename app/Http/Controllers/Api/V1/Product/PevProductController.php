<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductFacade;
use App\Http\Resources\ProductResource\PevProductResource;
use App\Http\Resources\ProductResource\PevProductResourceCollection;
use App\Http\Resources\ProductResource\PevProductOneResource;
use App\Http\Resources\ProductResource\PevProductOneResourceCollection;

class PevProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductResourceCollection(PevProductFacade::findAll()->where('deleted', 0));
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
        $resp = new PevProductResource(PevProductFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Product, registrado Correctamente.',
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
        return new PevProductOneResource(PevProductFacade::find($id));
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
        $objeto = PevProductFacade::find($id);
        $resp = new PevProductResource(PevProductFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product, actualizado Correctamente.',
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
        $objeto = PevProductFacade::find($id);
        $resp = new PevProductResource(PevProductFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
