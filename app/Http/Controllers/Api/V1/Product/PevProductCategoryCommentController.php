<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductCategoryCommentFacade;
use App\Http\Resources\ProductResource\PevProductCategoryCommentResource;
use App\Http\Resources\ProductResource\PevProductCategoryCommentResourceCollection;
use App\Http\Resources\ProductResource\PevProductCategoryCommentOneResource;
use App\Http\Resources\ProductResource\PevProductCategoryCommentOneResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductCategoryCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevProductCategoryCommentResourceCollection(PevProductCategoryCommentFacade::findAll()->where('deleted', 0));
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
        $resp = new PevProductCategoryCommentResource(PevProductCategoryCommentFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Product Category Comment, registrado Correctamente.',
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
        $resp = new PevProductCategoryCommentOneResource(PevProductCategoryCommentFacade::find($id));
        // if(empty($resp)){
        //     return [
        //         "status" => false,
        //         "msg" => "Error no existe el registro con el ID ".$id,
        //         "data" => $resp
        //     ];
        // }
        return $resp;
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
        $objeto = PevProductCategoryCommentFacade::find($id);
        $resp = new PevProductCategoryCommentResource(PevProductCategoryCommentFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'ProductCategoryComment, actualizado Correctamente.',
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
        $objeto = PevProductCategoryCommentFacade::find($id);
        $resp = new PevProductCategoryCommentResource(PevProductCategoryCommentFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Product Category Comment, eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
