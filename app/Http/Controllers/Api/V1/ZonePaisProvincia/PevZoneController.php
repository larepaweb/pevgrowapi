<?php

namespace App\Http\Controllers\Api\V1\ZonePaisProvincia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ZonePaisProvinciaFacade\PevZoneFacade;
use App\Http\Resources\ZonePaisProvinciaResource\PevZoneResource;
use App\Http\Resources\ZonePaisProvinciaResource\PevZoneResourceCollection;

class PevZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevZoneResourceCollection(PevZoneFacade::findAll()->where('deleted', 0));
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
        $resp = new PevZoneResource(PevZoneFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Zone registrado Correctamente.',
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
        return new PevZoneResource(PevZoneFacade::find($id));
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
        $objeto = PevZoneFacade::find($id);
        $resp = new PevZoneResource(PevZoneFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Zone actualizado Correctamente.',
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
        $objeto = PevZoneFacade::find($id);
        $resp = new PevZoneResource(PevZoneFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Zone eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
