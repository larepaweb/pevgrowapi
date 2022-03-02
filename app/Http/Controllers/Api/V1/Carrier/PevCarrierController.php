<?php

namespace App\Http\Controllers\Api\V1\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CarrierFacade\PevCarrierFacade;
use App\Http\Resources\CarrierResource\PevCarrierResource;
use App\Http\Resources\CarrierResource\PevCarrierResourceCollection;
use App\Http\Resources\CarrierResource\PevCarrierOneResource;
use App\Http\Resources\CarrierResource\PevCarrierOneResourceCollection;

class PevCarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCarrierResourceCollection(PevCarrierFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCarrierResource(PevCarrierFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Carrier registrado Correctamente.',
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
        return new PevCarrierOneResource(PevCarrierFacade::find($id));
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
        $objeto = PevCarrierFacade::find($id);
        $resp = new PevCarrierResource(PevCarrierFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Carrier actualizado Correctamente.',
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
        $objeto = PevCarrierFacade::find($id);
        $resp = new PevCarrierResource(PevCarrierFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Carrier eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
