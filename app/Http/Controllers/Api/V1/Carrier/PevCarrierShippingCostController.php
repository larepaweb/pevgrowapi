<?php

namespace App\Http\Controllers\Api\V1\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CarrierFacade\PevCarrierShippingCostFacade;
use App\Facade\CarrierFacade\PevCarrierRangePriceFacade;
use App\Facade\CarrierFacade\PevCarrierRangeWeightFacade;
use App\Http\Resources\CarrierResource\PevCarrierShippingCostResource;
use App\Http\Resources\CarrierResource\PevCarrierShippingCostResourceCollection;

class PevCarrierShippingCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCarrierShippingCostResourceCollection(PevCarrierShippingCostFacade::findAll()->where('deleted', 0));
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
        $cant_zone = sizeof($data['pev_zone_id']);
        $cant_price = sizeof($data['price']);

        if($cant_price != $cant_zone){
            return [
                'status' => false,
                'msg' => 'La cantidad de zonas no coincide con la cantidad de precios enviados.'
            ];
        }
        $variable = $data['range'];
        switch ($variable) {
            case 'price':
                $objeto =PevCarrierRangePriceFacade::create($data);
                $data['pev_carrier_range_price_id']= $objeto->id;
                $dato = [
                    'pev_carrier_id' => $data['pev_carrier_id'],
                    'pev_carrier_range_price_id' => $data['pev_carrier_range_price_id'],
                ];
                break;

            case 'weight':
                $objeto = PevCarrierRangeWeightFacade::create($data);
                $data['pev_carrier_range_weight_id']= $objeto->id;
                $dato = [
                    'pev_carrier_id' => $data['pev_carrier_id'],
                    'pev_carrier_range_weight_id' => $data['pev_carrier_range_weight_id'],
                ];
                break;
            
            default:
                return [
                    'status' => false,
                    'msg' => 'La opcion de rango enviada es incorrecta.'
                ];
                break;
        }

        for ($i=0; $i < $cant_price ; $i++) { 
            $dato['pev_zone_id'] = $data['pev_zone_id'][$i];
            $dato['price'] = $data['price'][$i];
            $resp[$i] = new PevCarrierShippingCostResource(PevCarrierShippingCostFacade::create($dato));

        }


        return [
            'status' => true,
            'msg' => 'Carrier Shipping Cost registrado Correctamente.',
            'data' => $resp,
        ];    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PevCarrierShippingCostResource(PevCarrierShippingCostFacade::find($id));
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
        $objeto = PevCarrierShippingCostFacade::find($id);
        $resp = new PevCarrierShippingCostResource(PevCarrierShippingCostFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Carrier Shipping Cost actualizado Correctamente.',
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
        $objeto = PevCarrierShippingCostFacade::find($id);
        $resp = new PevCarrierShippingCostResource(PevCarrierShippingCostFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Carrier Shipping Cost eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
