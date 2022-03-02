<?php

namespace App\Http\Controllers\Api\V1\HomePersonalizada;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\HomePersonalizadaFacade\PevCategoryVisitedFacade;
use App\Http\Resources\HomePersonalizadaResource\PevCategoryVisitedResource;
use App\Http\Resources\HomePersonalizadaResource\PevCategoryVisitedResourceCollection;
use App\Http\Requests\HomePersonalizadaRequest\PevCategoryVisitedRequestStore;
use App\Http\Requests\HomePersonalizadaRequest\PevCategoryVisitedRequestUpdate;

class PevCategoryVisitedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCategoryVisitedResourceCollection(PevCategoryVisitedFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCategoryVisitedResource(PevCategoryVisitedFacade::create($data));

        return [
            'status' => true,
            'msg' => 'CategoryVisited registrado Correctamente.',
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
        return new PevCategoryVisitedResource(PevCategoryVisitedFacade::find($id));
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
        $objeto = PevCategoryVisitedFacade::find($id);
        $resp = new PevCategoryVisitedResource(PevCategoryVisitedFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'CategoryVisited actualizado Correctamente.',
            'data' => $resp,
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
        $objeto = PevCategoryVisitedFacade::find($id);
        $resp = new PevCategoryVisitedResource(PevCategoryVisitedFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'CategoryVisited eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
