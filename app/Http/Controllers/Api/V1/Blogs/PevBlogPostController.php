<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogPostFacade;
use App\Facade\BlogFacade\PevBlogPostLangFacade;
use App\Http\Resources\BlogResource\PevBlogPostResource;
use App\Http\Resources\BlogResource\PevBlogPostResourceCollection;
use App\Http\Resources\BlogResource\PevBlogPostOneResource;
use App\Http\Resources\BlogResource\PevBlogPostOneResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogPostRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogPostRequest;

class PevBlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevBlogPostResourceCollection(PevBlogPostFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevBlogPostRequest $request)
    {
        $data = $request->validated();
        $resp = new PevBlogPostResource(PevBlogPostFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Blog_Post registrado Correctamente.',
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
        return new PevBlogPostOneResource(PevBlogPostFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogPostRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevBlogPostFacade::find($id);
        $resp = new PevBlogPostResource(PevBlogPostFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Blog_Post actualizado Correctamente.',
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
        $objeto = PevBlogPostFacade::find($id);
        $resp = new PevBlogPostResource(PevBlogPostFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Blog_Post eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
