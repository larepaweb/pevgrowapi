<?php

namespace App\Http\Controllers\Api\V1\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\FaqFacade\PevFaqCategoryLangFacade;
use App\Facade\FaqFacade\PevFaqCategoryFacade;
use App\Http\Resources\FaqResource\PevFaqCategoryLangResource;
use App\Http\Resources\FaqResource\PevFaqCategoryLangResourceCollection;
use App\Http\Requests\FaqRequest\StorePevFaqCategoryLangRequest;
use App\Http\Requests\FaqRequest\UpdatePevFaqCategoryLangRequest;

class PevFaqCategoryLangController extends Controller
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
            return new PevFaqCategoryLangResourceCollection(PevFaqCategoryLangFacade::findAll());
        }else {
            return new PevFaqCategoryLangResourceCollection(PevFaqCategoryLangFacade::forLangs($variable['por_idioma']));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevFaqCategoryLangRequest $request)
    {
    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
        $data = $request->all();
        $cantidad[0] = sizeof($data['name']);
        $cantidad[1] = sizeof($data['text']);

        // dd($cantidad);
        $category = PevFaqCategoryFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        if(empty($category)){//Verifico si la tabla esta vacia.
            $category = PevFaqCategoryFacade::create(['position' => 1]);
        }else {
            $category = PevFaqCategoryFacade::create(['position' => $category->id+1]);
        }
    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------

    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------


        $data['pev_faqcategory_id'] = $category->id;//capta el id de la insercion en ta tabla de pev_faq_categories

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevFaqCategoryLangResourceCollection(PevFaqCategoryLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $data['text'] = $data['text'][0];//convierto este array en una variable string dentro de la calve text
            $resp = new PevFaqCategoryLangResourceCollection(PevFaqCategoryLangFacade::traducirGuardar($data));

        }
    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------

        return [
            'status' => true,
            'msg' => 'FAQ Category Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevFaqCategoryLangResource(PevFaqCategoryLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevFaqCategoryLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevFaqCategoryLangFacade::find($id);
        $resp = new PevFaqCategoryLangResource(PevFaqCategoryLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'FAQ Category Lang, actualizado Correctamente.',
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
