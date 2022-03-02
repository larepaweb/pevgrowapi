<?php

namespace App\Http\Controllers\Api\V1\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\FaqFacade\PevFaqLangFacade;
use App\Facade\FaqFacade\PevFaqFacade;
use App\Http\Resources\FaqResource\PevFaqLangResource;
use App\Http\Resources\FaqResource\PevFaqLangResourceCollection;
use App\Http\Requests\FaqRequest\StorePevFaqLangRequest;
use App\Http\Requests\FaqRequest\UpdatePevFaqLangRequest;

class PevFaqLangController extends Controller
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
            return new PevFaqLangResourceCollection(PevFaqLangFacade::findAll());
        }else {
            return new PevFaqLangResourceCollection(PevFaqLangFacade::forLangs($variable['por_idioma']));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevFaqLangRequest $request)
    {
        $data = $request->validated();
        $cantidad[0] = sizeof($data['question']);
        $cantidad[1] = sizeof($data['answer']);

        $category = PevFaqFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
 
        if(empty($category)){//Verifico si la tabla esta vacia.
            $category = PevFaqFacade::create(['pev_faq_category_id'=>$data['pev_faq_category_id'], 'position' => 1]);
        }else {
            $category = PevFaqFacade::create(['pev_faq_category_id'=>$data['pev_faq_category_id'], 'position' => $category->id+1]);
        }
    //--------------------Etapa de creacio del FaqCategory con insercion en pev_faq_categories_table---------------------------------
    
    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
 
        
        $data['pev_faq_id'] = $category->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevFaqLangResourceCollection(PevFaqLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['question'] = $data['question'][0];//convierto este array en una variable string dentro de la clave name
            $data['answer'] = $data['answer'][0];//convierto este array en una variable string dentro de la calve text
            $resp = new PevFaqLangResourceCollection(PevFaqLangFacade::traducirGuardar($data));

        }
        
    //------------Etapa de creacio del FaqCategoryLang con insercion en pev_faq_category_langs_table---------------------------------
    
        return [
            'status' => true,
            'msg' => 'FAQ_Lang registrado Correctamente.',
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
        return new PevFaqLangResource(PevFaqLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevFaqLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevFaqLangFacade::find($id);
        $resp = new PevFaqLangResource(PevFaqLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'FAQ_Lang actualizado Correctamente.',
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
