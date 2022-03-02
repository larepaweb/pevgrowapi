<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ProductFacade\PevProductCategoryLangFacade;
use App\Facade\ProductFacade\PevProductCategoryFacade;
use App\Http\Resources\ProductResource\PevProductCategoryLangResource;
use App\Http\Resources\ProductResource\PevProductCategoryLangResourceCollection;
use App\Http\Requests\ProductRequest\StorePevProductCategoryLangRequest;
use App\Http\Requests\ProductRequest\UpdatePevProductCategoryLangRequest;

class PevProductCategoryLangController extends Controller
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
            return new PevProductCategoryLangResourceCollection(PevProductCategoryLangFacade::findAll());
        }else {
            return new PevProductCategoryLangResourceCollection(PevProductCategoryLangFacade::forLangs($variable['por_idioma']));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevProductCategoryLangRequest $request)
    {
        //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
        $data = $request->validated();
        $cantidad[0] = sizeof($data['name']);
        $cantidad[1] = sizeof($data['text_short']);
        $cantidad[2] = sizeof($data['text']);
        $cantidad[3] = sizeof($data['meta_title']);
        $cantidad[4] = sizeof($data['meta_description']);

        //$category = PevProductCategoryFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        $category = PevProductCategoryFacade::findAll();

        if($category->count() == 0){//Verifico si la tabla esta vacia.
            $data['position'] = 1;
            $data['pev_product_category_id_parent'] = 0;
            // $category = PevProductCategoryFacade::create(['pev_product_category_id_parent' => 0,'position' => 1]);
            $category = PevProductCategoryFacade::create($data);

        }else {
            $data['position'] = $category->count()+1;
            // $category = PevProductCategoryFacade::create(['pev_product_category_id_parent' => $data['pev_product_category_id_parent'],'position' => $category->id+1], );
            $category = PevProductCategoryFacade::create($data);

        }

    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------

    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

        $data['pev_product_category_id'] = $category->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevProductCategoryLangResourceCollection(PevProductCategoryLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $data['text_short'] = $data['text_short'][0];//convierto este array en una variable string dentro de la calve text
            $data['text'] = $data['text'][0];
            $data['meta_title'] = $data['meta_title'][0];
            $data['meta_description'] = $data['meta_description'][0];

            $resp = new PevProductCategoryLangResourceCollection(PevProductCategoryLangFacade::traducirGuardar($data));

        }
    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

        return [
            'status' => true,
            'msg' => 'Product Category Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevProductCategoryLangResource(PevProductCategoryLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevProductCategoryLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevProductCategoryLangFacade::find($id);
        if(empty($objeto)){
            return [
                'status' => true,
                'msg' => 'No existe registro con el ID '.$id,
                'data' => $objeto,
            ];
        }
        $resp = new PevProductCategoryLangResource(PevProductCategoryLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Product Category Lang, actualizado Correctamente.',
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
