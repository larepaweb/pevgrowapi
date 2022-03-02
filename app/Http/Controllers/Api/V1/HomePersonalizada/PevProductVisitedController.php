<?php

namespace App\Http\Controllers\Api\V1\HomePersonalizada;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\HomePersonalizadaFacade\PevProductVisitedFacade;
use App\Http\Resources\HomePersonalizadaResource\PevProductVisitedResource;
use App\Http\Resources\HomePersonalizadaResource\PevProductVisitedResourceCollection;
use App\Http\Requests\HomePersonalizadaRequest\PevProductVisitedRequestStore;
use App\Http\Requests\HomePersonalizadaRequest\PevProductVisitedRequestUpdate;

class PevProductVisitedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductVisitedResourceCollection(PevProductVisitedFacade::findAll()->where('deleted', 0));
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
        $resp = new PevProductVisitedResource(PevProductVisitedFacade::create($data));

        return [
            'status' => true,
            'msg' => 'ProductVisited registrado Correctamente.',
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
        return new PevProductVisitedResource(PevProductVisitedFacade::find($id));
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
        $objeto = PevProductVisitedFacade::find($id);
        $resp = new PevProductVisitedResource(PevProductVisitedFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'ProductVisited actualizado Correctamente.',
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
        $objeto = PevProductVisitedFacade::find($id);
        $resp = new PevProductVisitedResource(PevProductVisitedFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'ProductVisited eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
