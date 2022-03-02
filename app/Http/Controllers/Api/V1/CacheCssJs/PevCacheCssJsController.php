<?php

namespace App\Http\Controllers\Api\V1\CacheCssJs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CacheCssJsFacade\PevCacheCssJsFacade;
use App\Http\Resources\CacheCssJs\CacheCssJsResource;
use App\Http\Resources\CacheCssJs\CacheCssJsResourceCollection;
use App\Http\Requests\CacheCssJs\StoreCacheCssJsRequest;
use App\Http\Requests\CacheCssJs\UpdateCacheCssJsRequest;

class PevCacheCssJsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CacheCssJsResourceCollection(PevCacheCssJsFacade::findAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCacheCssJsRequest $request)
    {
        $data = $request->validated();
        $resp = new CacheCssJsResource(PevCacheCssJSFacade::create($data));

        return [
        'status' => true,
        'msg' => 'La entrada en cache se a creado correctamente',
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
        return new CacheCssJsResource(PevCacheCssJsFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCacheCssJsRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCacheCssJsFacade::find($id);

        $resp = new CacheCssJsResource(PevCacheCssJsFacade::update($objeto, $data));

        return [
        'status' => true,
        'msg' => 'La entrada en cache se a actualizado correctamente.',
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
        $objeto = PevCacheCssJsFacade::find($id);
        $resp = new CacheCssJsResource(PevCacheCssJsFacade::delete($objeto));

        return [
        'status' => true,
        'msg' => 'La entrada en cache se a eliminado correctamente.',
        'data' => $resp,
        ];

    }
}
