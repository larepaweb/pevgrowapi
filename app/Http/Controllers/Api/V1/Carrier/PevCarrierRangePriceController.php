<?php

namespace App\Http\Controllers\Api\V1\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CarrierFacade\PevCarrierRangePriceFacade;
use App\Http\Resources\CarrierResource\PevCarrierRangePriceResource;
use App\Http\Resources\CarrierResource\PevCarrierRangePriceResourceCollection;

class PevCarrierRangePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCarrierRangePriceResourceCollection(PevCarrierRangePriceFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCarrierRangePriceResource(PevCarrierRangePriceFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Carrier Range Price registrado Correctamente.',
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
        return new PevCarrierRangePriceResource(PevCarrierRangePriceFacade::find($id));
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
        $objeto = PevCarrierRangePriceFacade::find($id);
        $resp = new PevCarrierRangePriceResource(PevCarrierRangePriceFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Carrier Range Price actualizado Correctamente.',
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
        $objeto = PevCarrierRangePriceFacade::find($id);
        $resp = new PevCarrierRangePriceResource(PevCarrierRangePriceFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Carrier Range Price eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
