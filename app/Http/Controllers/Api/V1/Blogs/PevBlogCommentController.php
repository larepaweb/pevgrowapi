<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogCommentFacade;
use App\Facade\BlogFacade\PevBlogCommentLangFacade;
use App\Http\Resources\BlogResource\PevBlogCommentResource;
use App\Http\Resources\BlogResource\PevBlogCommentResourceCollection;
use App\Http\Resources\BlogResource\PevBlogCommentOneResource;
use App\Http\Resources\BlogResource\PevBlogCommentOneResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogCommentRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogCommentRequest;

class PevBlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevBlogCommentResourceCollection(PevBlogCommentFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevBlogCommentRequest $request)
    {
        $data = $request->validated();
        $resp = new PevBlogCommentResource(PevBlogCommentFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Blog_Comment registrado Correctamente.',
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
        return new PevBlogCommentOneResource(PevBlogCommentFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogCommentRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevBlogCommentFacade::find($id);
        $resp = new PevBlogCommentResource(PevBlogCommentFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Blog_Comment actualizado Correctamente.',
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
        $objeto = PevBlogCommentFacade::find($id);
        $resp = new PevBlogCommentResource(PevBlogCommentFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Blog_Comment eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
