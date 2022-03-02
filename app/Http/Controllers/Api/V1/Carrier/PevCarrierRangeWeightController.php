<?php

namespace App\Http\Controllers\Api\V1\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CarrierFacade\PevCarrierRangeWeightFacade;
use App\Http\Resources\CarrierResource\PevCarrierRangeWeightResource;
use App\Http\Resources\CarrierResource\PevCarrierRangeWeightResourceCollection;

class PevCarrierRangeWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCarrierRangeWeightResourceCollection(PevCarrierRangeWeightFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCarrierRangeWeightResource(PevCarrierRangeWeightFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Carrier Range Weight registrado Correctamente.',
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
        return new PevCarrierRangeWeightResource(PevCarrierRangeWeightFacade::find($id));
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
        $objeto = PevCarrierRangeWeightFacade::find($id);
        $resp = new PevCarrierRangeWeightResource(PevCarrierRangeWeightFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Carrier Range Weight actualizado Correctamente.',
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
        $objeto = PevCarrierRangeWeightFacade::find($id);
        $resp = new PevCarrierRangeWeightResource(PevCarrierRangeWeightFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Carrier Range Weight eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
