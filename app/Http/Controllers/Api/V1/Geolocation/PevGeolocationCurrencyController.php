<?php

namespace App\Http\Controllers\Api\V1\Geolocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\GeolocationFacade\PevGeolocationCurrencyFacade;
use App\Http\Resources\GeolocationResource\PevGeolocationCurrencyResource;
use App\Http\Resources\GeolocationResource\PevGeolocationCurrencyResourceCollection;

class PevGeolocationCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevGeolocationCurrencyResourceCollection(PevGeolocationCurrencyFacade::findAll()->where('deleted', 0));
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
        $resp = new PevGeolocationCurrencyResource(PevGeolocationCurrencyFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Geolocation Currency registrado Correctamente.',
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
        return new PevGeolocationCurrencyResource(PevGeolocationCurrencyFacade::find($id));
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
        $objeto = PevGeolocationCurrencyFacade::find($id);
        $resp = new PevGeolocationCurrencyResource(PevGeolocationCurrencyFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Geolocation Currency actualizado Correctamente.',
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
        $objeto = PevGeolocationCurrencyFacade::find($id);
        $resp = new PevGeolocationCurrencyResource(PevGeolocationCurrencyFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Geolocation Currency eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
