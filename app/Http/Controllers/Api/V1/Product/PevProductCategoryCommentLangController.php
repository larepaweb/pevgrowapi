<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductCategoryCommentLangFacade;
use App\Facade\ProductFacade\PevProductCategoryCommentFacade;
use App\Http\Resources\ProductResource\PevProductCategoryCommentLangResource;
use App\Http\Resources\ProductResource\PevProductCategoryCommentLangResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductCategoryCommentLangController extends Controller
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
            return new PevProductCategoryCommentLangResourceCollection(PevProductCategoryCommentLangFacade::findAll());
        }else {
            return new PevProductCategoryCommentLangResourceCollection(PevProductCategoryCommentLangFacade::forLangs($variable['por_idioma']));
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
         //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
         $data = $request->all();
         $cantidad[0] = sizeof($data['name']);
         $cantidad[1] = sizeof($data['title']);
         $cantidad[2] = sizeof($data['content']);
         $cantidad[3] = sizeof($data['respond']);

      
         $comment = PevProductCategoryCommentFacade::create($data);
    
     //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
     
     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
 
        $data['pev_prodcatcomment_id'] = $comment->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductCategoryCommentLangResourceCollection(PevProductCategoryCommentLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $data['title'] = $data['title'][0];//convierto este array en una variable string dentro de la calve text
            $data['content'] = $data['content'][0];
            $data['respond'] = $data['respond'][0];
            $resp = new PevProductCategoryCommentLangResourceCollection(PevProductCategoryCommentLangFacade::traducirGuardar($data));

        }
     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
     
         return [
             'status' => true,
             'msg' => 'Product Category Comment Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductCategoryCommentLangResource(PevProductCategoryCommentLangFacade::find($id));

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
        $objeto = PevProductCategoryCommentLangFacade::find($id);
        if(empty($objeto)){
            return [
                'status' => true,
                'msg' => 'No existe registro con el ID '.$id,
                'data' => $objeto,
            ];
        }
        $resp = new PevProductCategoryCommentLangResource(PevProductCategoryCommentLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Category Comment Lang, actualizado Correctamente.',
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
        return ['status' => false, 'msg' => 'Funcionalidad no implementada'];
    }
}
