<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevFeatureValuePevProductFacade;
use App\Http\Resources\ProductResource\PevFeatureValuePevProductResource;
use App\Http\Resources\ProductResource\PevFeatureValuePevProductResourceCollection;

class PevFeatureValuePevProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevFeatureValuePevProductResourceCollection(PevFeatureValuePevProductFacade::findAll()->where('deleted', 0));
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
        $resp = new PevFeatureValuePevProductResourceCollection(PevFeatureValuePevProductFacade::insertAll($data));
 
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
        return new PevFeatureValuePevProductResource(PevFeatureValuePevProductFacade::find($id));
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
        $objeto = PevFeatureValuePevProductFacade::find($id);
        $resp = new PevFeatureValuePevProductResource(PevFeatureValuePevProductFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Relacion Actualizada Correctamente.',
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
