<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductLangFacade;
use App\Facade\ProductFacade\PevProductFacade;
use App\Http\Resources\ProductResource\PevProductLangResource;
use App\Http\Resources\ProductResource\PevProductLangResourceCollection;

class PevProductLangController extends Controller
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
            return new PevProductLangResourceCollection(PevProductLangFacade::findAll());
        }else {
            return new PevProductLangResourceCollection(PevProductLangFacade::forLangs($variable['por_idioma']));
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
         //--------------------Etapa de creacio del Faqproduct con insercion en pev_faq_categories_table---------------------------------
         $data = $request->all();
         $cantidad[0] = sizeof($data['name']);
         $cantidad[0] = sizeof($data['text_intro']);
         $cantidad[0] = sizeof($data['text_short']);
         $cantidad[0] = sizeof($data['text']);
         $cantidad[0] = sizeof($data['meta_title']);
         $cantidad[0] = sizeof($data['meta_description']);
         
         $product = PevProductFacade::create($data);

     //--------------------Etapa de creacio del Faqproduct con insercion en pev_faq_categories_table---------------------------------
     
     //------------Etapa de creacio del FaqproductLang con insercion en pev_faq_product_langs_table---------------------------------
 
         $data['pev_product_id'] = $product->id;

         if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductLangResourceCollection(PevProductLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $data['text_intro'] = $data['text_intro'][0];//convierto este array en una variable string dentro de la clave name
            $data['text_short'] = $data['text_short'][0];//convierto este array en una variable string dentro de la clave name
            $data['text'] = $data['text'][0];//convierto este array en una variable string dentro de la clave name
            $data['meta_title'] = $data['meta_title'][0];//convierto este array en una variable string dentro de la clave name
            $data['meta_description'] = $data['meta_description'][0];//convierto este array en una variable string dentro de la clave name

            $resp = new PevProductLangResourceCollection(PevProductLangFacade::traducirGuardar($data));
        }

     //------------Etapa de creacio del FaqproductLang con insercion en pev_faq_product_langs_table---------------------------------
     
         return [
             'status' => true,
             'msg' => 'Product  Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductLangResource(PevProductLangFacade::find($id));
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
        $objeto = PevProductLangFacade::find($id);
        if(empty($objeto)){
            return [
                'status' => true,
                'msg' => 'No existe registro con el ID '.$id,
                'data' => $objeto,
            ];
        }
        $resp = new PevProductLangResource(PevProductLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product  Lang, actualizado Correctamente.',
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
