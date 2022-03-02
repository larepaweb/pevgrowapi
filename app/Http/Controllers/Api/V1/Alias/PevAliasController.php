<?php

namespace App\Http\Controllers\Api\V1\Alias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\AliasFacade\PevAliasFacade;
// use App\Facade\AliasFacade\PevAliasLangFacade;
use App\Http\Resources\AliasResource\PevAliasResource;
use App\Http\Resources\AliasResource\PevAliasResourceCollection;
use App\Http\Requests\AliasRequest\PevAliasRequestStore;
use App\Http\Requests\AliasRequest\PevAliasRequestUpdate;

class PevAliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevAliasResourceCollection(PevAliasFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PevAliasRequestStore $request)
    {
        $data = $request->validated();
        $resp = new PevAliasResource(PevAliasFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Alias registrado Correctamente.',
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
        return new PevAliasResource(PevAliasFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PevAliasRequestUpdate $request, $id)
    {
        $data = $request->validated();
        $objeto = PevAliasFacade::find($id);
        $resp = new PevAliasResource(PevAliasFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Alias actualizado Correctamente.',
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
        $objeto = PevAliasFacade::find($id);
        $resp = new PevAliasResource(PevAliasFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Alias eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
