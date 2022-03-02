<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductFeatureLangFacade;
use App\Facade\ProductFacade\PevProductFeatureFacade;
use App\Http\Resources\ProductResource\PevProductFeatureLangResource;
use App\Http\Resources\ProductResource\PevProductFeatureLangResourceCollection;
// use App\Http\Requests\ProductRequest\StorePevProductCategoryRequest;
// use App\Http\Requests\ProductRequest\UpdatePevProductCategoryRequest;

class PevProductFeatureLangController extends Controller
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
            return new PevProductFeatureLangResourceCollection(PevProductFeatureLangFacade::findAll()->sortBy('pev_product_feature_id'));
        }else {
            return new PevProductFeatureLangResourceCollection(PevProductFeatureLangFacade::forLangs($variable['por_idioma'])->sortBy('pev_product_feature_id'));
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

          $category = PevProductFeatureFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
          if(empty($category)){//Verifico si la tabla esta vacia.
              $category = PevProductFeatureFacade::create(['position' => 1]);
          }else {
              $category = PevProductFeatureFacade::create(['position' => $category->id+1]);
          }
  
      //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
      
      //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
  
          $data['pev_product_feature_id'] = $category->id;

          if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductFeatureLangResourceCollection(PevProductFeatureLangFacade::insertByLangs($data, $cantidad));
            }else {

                $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
                $resp = new PevProductFeatureLangResourceCollection(PevProductFeatureLangFacade::traducirGuardar($data));
            }
      //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
      
          return [
              'status' => true,
              'msg' => 'Product Feature Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductFeatureLangResource(PevProductFeatureLangFacade::find($id));
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
        $objeto = PevProductFeatureLangFacade::find($id);
        $resp = new PevProductFeatureLangResource(PevProductFeatureLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Feature Lang, actualizado Correctamente.',
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
