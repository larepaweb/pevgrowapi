<?php

namespace App\Http\Controllers\Api\V1\Ekomi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\EkomiFacade\PevEkomiOrderFacade;
use App\Http\Resources\EkomiResource\PevEkomiOrderResource;
use App\Http\Resources\EkomiResource\PevEkomiOrderResourceCollection;

class PevEkomiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevEkomiOrderResourceCollection(PevEkomiOrderFacade::findAll()->where('deleted', 0));
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
        $resp = new PevEkomiOrderResource(PevEkomiOrderFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Ekomi Shop Rating registrado Correctamente.',
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
        return new PevEkomiOrderResource(PevEkomiOrderFacade::find($id));
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
        $objeto = PevEkomiOrderFacade::find($id);
        $resp = new PevEkomiOrderResource(PevEkomiOrderFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Ekomi Shop Rating actualizado Correctamente.',
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
         $objeto = PevEkomiOrderFacade::find($id);
        $resp = new PevEkomiOrderResource(PevEkomiOrderFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Ekomi Shop Rating eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
