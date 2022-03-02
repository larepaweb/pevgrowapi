<?php

namespace App\Http\Controllers\Api\V1\Ekomi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\EkomiFacade\PevEkomiShopRatingFacade;
use App\Http\Resources\EkomiResource\PevEkomiShopRatingResource;
use App\Http\Resources\EkomiResource\PevEkomiShopRatingResourceCollection;

class PevEkomiShopRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevEkomiShopRatingResourceCollection(PevEkomiShopRatingFacade::findAll()->where('deleted', 0));

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
        $resp = new PevEkomiShopRatingResource(PevEkomiShopRatingFacade::create($data));

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
        return new PevEkomiShopRatingResource(PevEkomiShopRatingFacade::find($id));
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
        $objeto = PevEkomiShopRatingFacade::find($id);
        $resp = new PevEkomiShopRatingResource(PevEkomiShopRatingFacade::update($objeto, $data));

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
        $objeto = PevEkomiShopRatingFacade::find($id);
        $resp = new PevEkomiShopRatingResource(PevEkomiShopRatingFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Ekomi Shop Rating eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
