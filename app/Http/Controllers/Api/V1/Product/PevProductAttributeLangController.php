<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductAttributeLangFacade;
use App\Facade\ProductFacade\PevProductAttributeFacade;
use App\Http\Resources\ProductResource\PevProductAttributeLangResource;
use App\Http\Resources\ProductResource\PevProductAttributeLangResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductAttributeLangRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductAttributeLangRequest;

class PevProductAttributeLangController extends Controller
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
            return new PevProductAttributeLangResourceCollection(PevProductAttributeLangFacade::findAll());
        }else {
            return new PevProductAttributeLangResourceCollection(PevProductAttributeLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductAttributeLangRequest $request)
    {
    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
         $data = $request->validated();
         $cantidad[0] = sizeof($data['name']);


         $category = PevProductAttributeFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
         if(empty($category)){//Verifico si la tabla esta vacia.
             $category = PevProductAttributeFacade::create(['pev_prod_att_group_id' => $data['pev_prod_att_group_id'],'position' => 1]);
         }else {
             $category = PevProductAttributeFacade::create(['pev_prod_att_group_id' => $data['pev_prod_att_group_id'],'position' => $category->id+1]);
         }

     //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------

     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

         $data['pev_product_attribute_id'] = $category->id;

         if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductAttributeLangResourceCollection(PevProductAttributeLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevProductAttributeLangResourceCollection(PevProductAttributeLangFacade::traducirGuardar($data));
        }

     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

         return [
             'status' => true,
             'msg' => 'Product Attribute Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductAttributeLangResource(PevProductAttributeLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductAttributeLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevProductAttributeLangFacade::find($id);
        if(empty($objeto)){
            return [
                'status' => true,
                'msg' => 'No existe registro con el ID '.$id,
                'data' => $objeto,
            ];
        }
        $resp = new PevProductAttributeLangResource(PevProductAttributeLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute Lang, actualizado Correctamente.',
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
