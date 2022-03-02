<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductCategoryFacade;
use App\Http\Resources\ProductResource\PevProductCategoryResource;
use App\Http\Resources\ProductResource\PevProductCategoryResourceCollection;
use App\Http\Resources\ProductResource\PevProductCategoryOneResource;
use App\Http\Resources\ProductResource\PevProductCategoryOneResourceCollection;
use App\Http\Resources\ProductResource\PevProductCategoryTreeResource;
use App\Http\Resources\ProductResource\PevProductCategoryTreeResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductCategoryResourceCollection(PevProductCategoryFacade::findAllPageFilter());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductCategoryRequest $request)
    {
        $data = $request->validated();
        $resp = new PevProductCategoryResource(PevProductCategoryFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Product Category, registrado Correctamente.',
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
        return new PevProductCategoryOneResource(PevProductCategoryFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevProductCategoryFacade::find($id);
        $resp = new PevProductCategoryResource(PevProductCategoryFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'ProductCategory, actualizado Correctamente.',
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
        $objeto = PevProductCategoryFacade::find($id);
        $resp = new PevProductCategoryResource(PevProductCategoryFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Category, eliminada Correctamente.',
            'data' => $resp,
        ];
    }

    public function parent_tree($parent_id)
    {
        $campo = 'pev_product_category_id_parent';
        $resp = PevProductCategoryFacade::maketree($campo, $parent_id);

        return [
            'status' => true,
            'pev_product_category_id_parent' => $parent_id,
            //'data' => ['lable' => new PevProductCategoryTreeResourceCollection($resp), 'children' => $resp],
            'children' => new PevProductCategoryTreeResourceCollection($resp),
        ];
    }
}
