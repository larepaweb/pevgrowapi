<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductCommentLangFacade;
use App\Facade\ProductFacade\PevProductCommentFacade;
use App\Http\Resources\ProductResource\PevProductCommentLangResource;
use App\Http\Resources\ProductResource\PevProductCommentLangResourceCollection;

class PevProductCommentLangController extends Controller
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
            return new PevProductCommentLangResourceCollection(PevProductCommentLangFacade::findAll());
        }else {
            return new PevProductCommentLangResourceCollection(PevProductCommentLangFacade::forLangs($variable['por_idioma']));
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
           //--------------------Etapa de creacio del Faqcomment con insercion en pev_faq_categories_table---------------------------------
           $data = $request->all();
           $cantidad[0] = sizeof($data['title']);
           $cantidad[1] = sizeof($data['content']);
           $cantidad[2] = sizeof($data['respond']);
           $comment = PevProductCommentFacade::create($data);
        //    $comment = PevProductCommentFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        //    if(empty($comment)){//Verifico si la tabla esta vacia.
        //        $comment = PevProductCommentFacade::create(['position' => 1]);
        //    }else {
        //        $comment = PevProductCommentFacade::create(['position' => $comment->id+1]);
        //    }
   
       //--------------------Etapa de creacio del Faqcomment con insercion en pev_faq_categories_table---------------------------------
       
       //------------Etapa de creacio del FaqcommentLang con insercion en pev_faq_comment_langs_table---------------------------------
   
           $data['pev_product_comment_id'] = $comment->id;

           if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
             $resp = new PevProductCommentLangResourceCollection(PevProductCommentLangFacade::insertByLangs($data, $cantidad));
             }else {
                 $data['title'] = $data['title'][0];//convierto este array en una variable string dentro de la clave name
                 $data['content'] = $data['content'][0];
                 $data['respond'] = $data['respond'][0];
                 $resp = new PevProductCommentLangResourceCollection(PevProductCommentLangFacade::traducirGuardar($data));
             }
       //------------Etapa de creacio del FaqcommentLang con insercion en pev_faq_comment_langs_table---------------------------------
       
           return [
               'status' => true,
               'msg' => 'Product Comment Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductCommentLangResource(PevProductCommentLangFacade::find($id));
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
        $objeto = PevProductCommentLangFacade::find($id);
        $resp = new PevProductCommentLangResource(PevProductCommentLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Comment Lang, actualizado Correctamente.',
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
