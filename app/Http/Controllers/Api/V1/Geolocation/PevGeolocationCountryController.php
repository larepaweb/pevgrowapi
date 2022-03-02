<?php

namespace App\Http\Controllers\Api\V1\Geolocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\GeolocationFacade\PevGeolocationCountryFacade;
use App\Http\Resources\GeolocationResource\PevGeolocationCountryResource;
use App\Http\Resources\GeolocationResource\PevGeolocationCountryResourceCollection;

class PevGeolocationCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PevGeolocationCountryFacade::findAllPageFilter();
        return new PevGeolocationCountryResourceCollection($data);
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
        $resp = new PevGeolocationCountryResource(PevGeolocationCountryFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Geolocation Country registrado Correctamente.',
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
        return new PevGeolocationCountryResource(PevGeolocationCountryFacade::find($id));
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
        $objeto = PevGeolocationCountryFacade::find($id);
        $resp = new PevGeolocationCountryResource(PevGeolocationCountryFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Geolocation Country actualizado Correctamente.',
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
        $objeto = PevGeolocationCountryFacade::find($id);
        $resp = new PevGeolocationCountryResource(PevGeolocationCountryFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Geolocation Country eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
