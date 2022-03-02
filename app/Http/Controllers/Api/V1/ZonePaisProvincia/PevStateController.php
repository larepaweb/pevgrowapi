<?php

namespace App\Http\Controllers\Api\V1\ZonePaisProvincia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ZonePaisProvinciaFacade\PevStateFacade;
use App\Http\Resources\ZonePaisProvinciaResource\PevStateResource;
use App\Http\Resources\ZonePaisProvinciaResource\PevStateResourceCollection;

class PevStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevStateResourceCollection(PevStateFacade::findAll()->where('deleted', 0));
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
        $resp = new PevStateResource(PevStateFacade::create($data));

        return [
            'status' => true,
            'msg' => 'State registrado Correctamente.',
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
        return new PevStateResource(PevStateFacade::find($id));
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
        $objeto = PevStateFacade::find($id);
        $resp = new PevStateResource(PevStateFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'State actualizado Correctamente.',
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
        $objeto = PevStateFacade::find($id);
        $resp = new PevStateResource(PevStateFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'State eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
