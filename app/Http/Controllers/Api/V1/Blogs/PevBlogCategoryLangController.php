<?php

namespace App\Http\Controllers\Api\V1\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\BlogFacade\PevBlogCategoryLangFacade;
use App\Facade\BlogFacade\PevBlogCategoryFacade;
use App\Http\Resources\BlogResource\PevBlogCategoryLangResource;
use App\Http\Resources\BlogResource\PevBlogCategoryLangResourceCollection;
use App\Http\Requests\BlogRequest\StorePevBlogCategoryLangRequest;
use App\Http\Requests\BlogRequest\UpdatePevBlogCategoryLangRequest;

class PevBlogCategoryLangController extends Controller
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
            return new PevBlogCategoryLangResourceCollection(PevBlogCategoryLangFacade::findAll());
        }else {
            return new PevBlogCategoryLangResourceCollection(PevBlogCategoryLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevBlogCategoryLangRequest $request)
    {
        //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
        $data = $request->validated();
        $cantidad[0] = sizeof($data['name']);
        $cantidad[1] = sizeof($data['text']);
        $cantidad[2] = sizeof($data['meta_title']);
        $cantidad[3] = sizeof($data['meta_description']);


        $category = PevBlogCategoryFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo

        if(empty($category)){//Verifico si la tabla esta vacia.
            $category = PevBlogCategoryFacade::create(['position' => 1]);
        }else {
            $category = PevBlogCategoryFacade::create(['position' => $category->id+1]);
        }

        // dd($category->id);
    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------

    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

        //
        $data['pev_blog_category_id'] = $category->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevBlogCategoryLangResourceCollection(PevBlogCategoryLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $data['text'] = $data['text'][0];//convierto este array en una variable string dentro de la calve text
            $data['meta_title'] = $data['meta_title'][0];
            $data['meta_description'] = $data['meta_description'][0];
            $resp = new PevBlogCategoryLangResourceCollection(PevBlogCategoryLangFacade::traducirGuardar($data));

        }


    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

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
        return new PevBlogCategoryLangResource(PevBlogCategoryLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevBlogCategoryLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevBlogCategoryLangFacade::find($id);
        $resp = new PevBlogCategoryLangResource(PevBlogCategoryLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Blog_Category actualizado Correctamente.',
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
