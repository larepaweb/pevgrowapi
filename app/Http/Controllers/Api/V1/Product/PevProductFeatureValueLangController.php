<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductFeatureValueLangFacade;
use App\Facade\ProductFacade\PevProductFeatureValueFacade;
use App\Http\Resources\ProductResource\PevProductFeatureValueLangResource;
use App\Http\Resources\ProductResource\PevProductFeatureValueLangResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductFeatureValueLangController extends Controller
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
            return new PevProductFeatureValueLangResourceCollection(PevProductFeatureValueLangFacade::findAllPage());
        }else {
            return new PevProductFeatureValueLangResourceCollection(PevProductFeatureValueLangFacade::forLangs($variable['por_idioma']));
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
        $cantidad[0] = sizeof($data['value']);

        $category = PevProductFeatureValueFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        if(empty($category)){//Verifico si la tabla esta vacia.
            $category = PevProductFeatureValueFacade::create(['pev_product_feature_id' =>$data['pev_product_feature_id'], 'position' => 1]);
        }else {
            $category = PevProductFeatureValueFacade::create(['pev_product_feature_id' =>$data['pev_product_feature_id'], 'position' => $category->id+1]);
        }

       //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
       
       //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
   
           $data['pev_prod_feat_val_id'] = $category->id;

           if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductFeatureValueLangResourceCollection(PevProductFeatureValueLangFacade::insertByLangs($data, $cantidad));
            }else {

                $data['value'] = $data['value'][0];//convierto este array en una variable string dentro de la clave name
                $resp = new PevProductFeatureValueLangResourceCollection(PevProductFeatureValueLangFacade::traducirGuardar($data));
            }
       //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
       
           return [
               'status' => true,
               'msg' => 'Product Feature Value Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductFeatureValueLangResource(PevProductFeatureValueLangFacade::find($id));
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
        $objeto = PevProductFeatureValueLangFacade::find($id);
        $resp = new PevProductFeatureValueLangResource(PevProductFeatureValueLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute, actualizado Correctamente.',
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
