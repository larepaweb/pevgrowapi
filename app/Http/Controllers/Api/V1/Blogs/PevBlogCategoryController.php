<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogCategoryFacade;
use App\Facade\BlogFacade\PevBlogCategoryLangFacade;
use App\Http\Resources\BlogResource\PevBlogCategoryResource;
use App\Http\Resources\BlogResource\PevBlogCategoryResourceCollection;
use App\Http\Resources\BlogResource\PevBlogCategoryOneResource;
use App\Http\Resources\BlogResource\PevBlogCategoryOneResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogCategoryRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogCategoryRequest;

class PevBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevBlogCategoryResourceCollection(PevBlogCategoryFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevBlogCategoryRequest $request)
    {
        $data = $request->validated();
        $resp = new PevBlogCategoryResource(PevBlogCategoryFacade::create($data));

        return [
            'status' => true,
            'msg' => 'La categoria de blog se a creado correctamente',
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
        return new PevBlogCategoryOneResource(PevBlogCategoryFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogCategoryRequest $request, $id)
    {

        $data = $request->all();
        $objeto = PevBlogCategoryFacade::find($id);
        // if($data['reordenamiento'] == true){
        //     dd("aqui puede ir el reordenamiento.");
        // }else {
            $resp = new PevBlogCategoryResource(PevBlogCategoryFacade::update($objeto, $data));
        // }


        return [
            'status' => true,
            'msg' => 'La categoria de blog se a actualizado correctamente.',
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
        $objeto = PevBlogCategoryFacade::find($id);
        $resp = new PevBlogCategoryResource(PevBlogCategoryFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'La categoria de blog se a eliminado correctamente.',
            'data' => $resp,
        ];
    }
}
