<?php

namespace App\Http\Controllers\Api\V1\Gift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\GiftFacade\PevGiftFacade;
use App\Http\Resources\GiftResource\PevGiftResource;
use App\Http\Resources\GiftResource\PevGiftResourceCollection;
use App\Http\Requests\GiftRequest\StorePevGiftRequest;
use App\Http\Requests\GiftRequest\UpdatePevGiftRequest;

class PevGiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevGiftResourceCollection(PevGiftFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevGiftRequest $request)
    {
        $data = $request->validated();
        $resp = new PevGiftResource(PevGiftFacade::create($data));
        $resp->Products()->sync($data['pev_product_id']);

        return [
            'status' => true,
            'msg' => 'Gift registrado Correctamente.',
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
        return new PevGiftResource(PevGiftFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevGiftRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevGiftFacade::find($id);
        $resp = new PevGiftResource(PevGiftFacade::update($objeto, $data));

        if((!empty($data['pev_product_id_old']))&&(!empty($data['pev_product_id_new'])))
        {

            $resp->Products()->updateExistingPivot($data['pev_product_id_old'], ['pev_product_id' => $data['pev_product_id_new']]);
        }
        return [
            'status' => true,
            'msg' => 'Gift actualizado Correctamente.',
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
        $objeto = PevGiftFacade::find($id);
        $resp = new PevGiftResource(PevGiftFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Gift eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
