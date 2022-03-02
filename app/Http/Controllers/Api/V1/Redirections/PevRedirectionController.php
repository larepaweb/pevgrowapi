<?php

namespace App\Http\Controllers\Api\V1\Redirections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\RedirectionFacade\PevRedirectionFacade;
use App\Http\Resources\RedirectionResource\PevRedirectionResource;
use App\Http\Resources\RedirectionResource\PevRedirectionResourceCollection;
use App\Http\Requests\RedirectionRequest\StorePevRedirectionRequest;
use App\Http\Requests\RedirectionRequest\UpdatePevRedirectionRequest;

class PevRedirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevRedirectionResourceCollection(PevRedirectionFacade::findAll()->where('deleted', 0));
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
        $resp = new PevRedirectionResource(PevRedirectionFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Redireccionamiento registrado Correctamente.',
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
        return new PevRedirectionResource(PevRedirectionFacade::find($id));
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
        $objeto = PevRedirectionFacade::find($id);
        $resp = new PevRedirectionResource(PevRedirectionFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Redireccionamiento actualizado Correctamente.',
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
        $objeto = PevRedirectionFacade::find($id);
        $resp = new PevRedirectionResource(PevRedirectionFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Redireccion eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
