<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogPostLangFacade;
use App\Facade\BlogFacade\PevBlogPostFacade;
use App\Http\Resources\BlogResource\PevBlogPostLangResource;
use App\Http\Resources\BlogResource\PevBlogPostLangResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogPostLangRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogPostLangRequest;

class PevBlogPostLangController extends Controller
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
            return new PevBlogPostLangResourceCollection(PevBlogPostLangFacade::findAll());
        }else {
            return new PevBlogPostLangResourceCollection(PevBlogPostLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevBlogPostLangRequest $request)
    {
         //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
         $data = $request->validated();
         $cantidad[0] = sizeof($data['name']);
         $cantidad[1] = sizeof($data['text']);
         $cantidad[2] = sizeof($data['meta_title']);
         $cantidad[3] = sizeof($data['meta_description']);


         $data['date_publish'] = date('Y-m-d H:i:s');//capto la fecha del servidor para registrar la fecha de la publicacion.
         $blogpost = PevBlogPostFacade::create(['pev_admin_id' => $data['pev_admin_id']]);//obtengo el ultimo registro de la tabla para incrementarlo
         $data['pev_blog_post_id'] = $blogpost->id;
         //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
     
     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
  
     if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
        $resp = new PevBlogPostLangResourceCollection(PevBlogPostLangFacade::insertByLangs($data, $cantidad));
    }else {

        $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
        $data['text'] = $data['text'][0];//convierto este array en una variable string dentro de la calve text
        $data['meta_title'] = $data['meta_title'][0];
        $data['meta_description'] = $data['meta_description'][0];
        $resp = new PevBlogPostLangResourceCollection(PevBlogPostLangFacade::traducirGuardar($data));

    }
         
     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
         $blogpost->Categories()->sync($data['pev_blog_category_id']);//insercion en la tabla pivote
         return [
             'status' => true,
             'msg' => 'Blog Category Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevBlogPostLangResource(PevBlogPostLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogPostLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevBlogPostLangFacade::find($id);
        $resp = new PevBlogPostLangResource(PevBlogPostLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Blog_Post_lang actualizado Correctamente.',
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
