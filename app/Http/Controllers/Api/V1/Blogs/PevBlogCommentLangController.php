<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogCommentLangFacade;
use App\Facade\BlogFacade\PevBlogCommentFacade;
use App\Http\Resources\BlogResource\PevBlogCommentLangResource;
use App\Http\Resources\BlogResource\PevBlogCommentLangResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogCommentLangRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogCommentLangRequest;

class PevBlogCommentLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variable = $request->only('por_idioma');

        if(empty($variable['por_idioma'])){
            return new PevBlogCommentLangResourceCollection(PevBlogCommentLangFacade::findAll());
        }else {
            return new PevBlogCommentLangResourceCollection(PevBlogCommentLangFacade::forLangs($variable['por_idioma']));
        }
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
        $cantidad[0] = sizeof($data['comment']);

        $comment = PevBlogCommentFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        if(empty($comment)){//Verifico si la tabla esta vacia.
            $data['position'] = 1;
            $comment = PevBlogCommentFacade::create($data);
        }else {
            $data['position'] = $comment->id+1;
            $comment = PevBlogCommentFacade::create($data);
        }

        $data['pev_blog_comment_id'] = $comment->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevBlogCommentLangResourceCollection(PevBlogCommentLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['comment'] = $data['comment'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevBlogCommentLangResourceCollection(PevBlogCommentLangFacade::traducirGuardar($data));

        }
      
        //------------Etapa de creacio del FaqCommentLang con insercion en pev_faq_Comment_langs_table---------------------------------
        
            return [
                'status' => true,
                'msg' => 'Blog Category Lang, registrado Correctamente en todos los Idiomas.',
                'data' => $resp,
            ];



        // $resp = new PevBlogCommentLangResource(PevBlogCommentLangFacade::create($data));

        // return [
        //     'status' => true,
        //     'msg' => 'Blog_Comment_Lang registrado Correctamente.',
        //     'data' => $resp,
        // ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PevBlogCommentLangResource(PevBlogCommentLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogCommentLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevBlogCommentLangFacade::find($id);
        $resp = new PevBlogCommentLangResource(PevBlogCommentLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Blog_Comment_Lang actualizado Correctamente.',
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
        return ['status' => false, 'msg' => 'Funcionalidad no implementada'];
    }
}
