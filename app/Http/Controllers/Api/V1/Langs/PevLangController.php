<?php

namespace App\Http\Controllers\Api\V1\Langs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\LangFacade\PevLangFacade;
use App\Http\Resources\LangResource\PevLangResource;
use App\Http\Resources\LangResource\PevLangResourceCollection;
use App\Http\Requests\LangRequest\StorePevLangRequest;
use App\Http\Requests\LangRequest\UpdatePevLangRequest;

class PevLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevLangResourceCollection(PevLangFacade::findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevLangRequest $request)
    {
        $data = $request->validated();
        $resp = new PevLangResource(PevLangFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Idioma registrado Correctamente.',
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
        return new PevLangResource(PevLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevLangFacade::find($id);
        $resp = new PevLangResource(PevLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Idioma actualizado Correctamente.',
            'data' => $resp, //->response()->setStatusCode(Response::HTTP_CREATED),
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
        return ['status' => false, 'msg' => 'Funcionalidad no implementada'];
    }
}
