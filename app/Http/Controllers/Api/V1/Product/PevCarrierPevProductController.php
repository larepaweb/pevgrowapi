<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevCarrierPevProductFacade;
use App\Http\Resources\ProductResource\PevCarrierPevProductResource;
use App\Http\Resources\ProductResource\PevCarrierPevProductResourceCollection;

class PevCarrierPevProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCarrierPevProductResourceCollection(PevCarrierPevProductFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCarrierPevProductResourceCollection(PevCarrierPevProductFacade::insertAll($data));
 
         return [
             'status' => true,
             'msg' => 'Relaciones Guardada Correctamente.',
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
        return new PevCarrierPevProductResource(PevCarrierPevProductFacade::find($id));
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
        $objeto = PevCarrierPevProductFacade::find($id);
        $resp = new PevCarrierPevProductResource(PevCarrierPevProductFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Imagen Actualizada Correctamente.',
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
        return [
            'status' => "false",
            'msg' => "Funcionalidad no implementada."
        ];
    }
}
