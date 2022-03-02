<?php

namespace App\Http\Controllers\Api\V1\ZonePaisProvincia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ZonePaisProvinciaFacade\PevCountryFacade;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryResource;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryResourceCollection;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryOneResource;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryOneResourceCollection;

class PevCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCountryResourceCollection(PevCountryFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCountryResource(PevCountryFacade::create($data));

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
        return new PevCountryOneResource(PevCountryFacade::find($id));
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
        $objeto = PevCountryFacade::find($id);
        $resp = new PevCountryResource(PevCountryFacade::update($objeto, $data));

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
        $objeto = PevCountryFacade::find($id);
        $resp = new PevCountryResource(PevCountryFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Zone eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
