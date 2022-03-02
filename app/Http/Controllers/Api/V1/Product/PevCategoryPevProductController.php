<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevCategoryPevProductFacade;
use App\Http\Resources\ProductResource\PevCategoryPevProductResource;
use App\Http\Resources\ProductResource\PevCategoryPevProductResourceCollection;


class PevCategoryPevProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCategoryPevProductResourceCollection(PevCategoryPevProductFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCategoryPevProductResourceCollection(PevCategoryPevProductFacade::insertAll($data));
 
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
        return new PevCategoryPevProductResource(PevCategoryPevProductFacade::find($id));
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
        $objeto = PevCategoryPevProductFacade::find($id);
        $resp = new PevCategoryPevProductResource(PevCategoryPevProductFacade::update($objeto, $data));

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
