<?php

namespace App\Http\Controllers\Api\V1\Currency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CurrencyFacade\PevCurrencyFacade;
use App\Http\Resources\CurrencyResource\PevCurrencyResource;
use App\Http\Resources\CurrencyResource\PevCurrencyResourceCollection;

class PevCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCurrencyResourceCollection(PevCurrencyFacade::findAll()->where('deleted', 0));
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
        $resp = new PevCurrencyResource(PevCurrencyFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Currency registrado Correctamente.',
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
        return new PevCurrencyResource(PevCurrencyFacade::find($id));
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
        $objeto = PevCurrencyFacade::find($id);
        $resp = new PevCurrencyResource(PevCurrencyFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Currency actualizado Correctamente.',
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
        $objeto = PevCurrencyFacade::find($id);
        $resp = new PevCurrencyResource(PevCurrencyFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Currency eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
