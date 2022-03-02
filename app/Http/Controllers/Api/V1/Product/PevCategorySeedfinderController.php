<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevCategorySeedfinderFacade;
use App\Http\Resources\ProductResource\PevCategorySeedfinderResource;
use App\Http\Resources\ProductResource\PevCategorySeedfinderResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevCategorySeedfinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCategorySeedfinderResourceCollection(PevCategorySeedfinderFacade::findAll());
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
        $resp = new PevCategorySeedfinderResource(PevCategorySeedfinderFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Category Seedfinder, registrado Correctamente.',
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
        return new PevCategorySeedfinderResource(PevCategorySeedfinderFacade::find($id));
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
        $objeto = PevCategorySeedfinderFacade::find($id);
        $resp = new PevCategorySeedfinderResource(PevCategorySeedfinderFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Category Seedfinder, actualizado Correctamente.',
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
        $objeto = PevCategorySeedfinderFacade::find($id);
        $resp = new PevCategorySeedfinderResource(PevCategorySeedfinderFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Category Seedfinder, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
