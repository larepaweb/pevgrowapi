<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductAttributeGroupLangFacade;
use App\Facade\ProductFacade\PevProductAttributeGroupFacade;
use App\Http\Resources\ProductResource\PevProductAttributeGroupLangResource;
use App\Http\Resources\ProductResource\PevProductAttributeGroupLangResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductAttributeGroupLangRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductAttributeGroupLangRequest;

class PevProductAttributeGroupLangController extends Controller
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
            return new PevProductAttributeGroupLangResourceCollection(PevProductAttributeGroupLangFacade::findAll());
        }else {
            return new PevProductAttributeGroupLangResourceCollection(PevProductAttributeGroupLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductAttributeGroupLangRequest $request)
    {
        //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
        $data = $request->validated();
        $cantidad[0] = sizeof($data['name']);

        $category = PevProductAttributeGroupFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo

         if(empty($category)){//Verifico si la tabla esta vacia.
             $category = PevProductAttributeGroupFacade::create(['is_color_group' => $data['is_color_group'], 'group_type' => $data['group_type'],'position' => 1]);
         }else {
             $category = PevProductAttributeGroupFacade::create(['is_color_group' => $data['is_color_group'], 'group_type' => $data['group_type'],'position' => $category->id+1]);
         }

     //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------

     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

        $data['pev_prod_att_group_id'] = $category->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductAttributeGroupLangResourceCollection(PevProductAttributeGroupLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevProductAttributeGroupLangResourceCollection(PevProductAttributeGroupLangFacade::traducirGuardar($data));
        }
     //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

         return [
             'status' => true,
             'msg' => 'Product Attribute Group Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductAttributeGroupLangResource(PevProductAttributeGroupLangFacade::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductAttributeGroupLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevProductAttributeGroupLangFacade::find($id);
        $resp = new PevProductAttributeGroupLangResource(PevProductAttributeGroupLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Attribute Group Lang, actualizado Correctamente.',
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
