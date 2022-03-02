<?php

namespace App\Http\Controllers\Api\V1\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CarrierFacade\PevCarrierLangFacade;
use App\Facade\CarrierFacade\PevCarrierFacade;
use App\Http\Resources\CarrierResource\PevCarrierLangResource;
use App\Http\Resources\CarrierResource\PevCarrierLangResourceCollection;

class PevCarrierLangController extends Controller
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
            return new PevCarrierLangResourceCollection(PevCarrierLangFacade::findAll());
        }else {
            return new PevCarrierLangResourceCollection(PevCarrierLangFacade::forLangs($variable['por_idioma']));
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
        $data = $request->all();
        $cantidad[0] = sizeof($data['name_carrier_lang']);

        //--------------------Etapa de creacio del Carrier con insercion en pev_faq_categories_table---------------------------------

        $carrier = PevCarrierFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        if(empty($carrier)){//Verifico si la tabla esta vacia.
            $data['position'] = 1;
            $carrier = PevCarrierFacade::create($data);
        }else {
            $data['position'] = $carrier->id+1;
            $carrier = PevCarrierFacade::create($data);
        }
    //--------------------Etapa de creacio del Carrier con insercion en pev_faq_categories_table---------------------------------
    
    //------------Etapa de creacio del CarrierLang con insercion en pev_faq_category_langs_table---------------------------------
 
        //-----------------------limpio la data y creo un array nuevo solo para la insercion en carrierlang------------------
        $data2['pev_carrier_id'] = $carrier->id;
        $data2['pev_lang_id'] = $data['pev_lang_id'];
        $data2['name'] = $data['name_carrier_lang'];
        $data2['delay'] = $data['delay'];
        //-----------------------limpio la data y creo un array nuevo solo para la insercion en carrierlang------------------

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevCarrierLangResourceCollection(PevCarrierLangFacade::insertByLangs($data2, $cantidad));
        }else {

            $data2['name'] = $data['name_carrier_lang'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevCarrierLangResourceCollection(PevCarrierLangFacade::traducirGuardar($data2));

        }

        
    //------------Etapa de creacio del CarrierLang con insercion en pev_faq_Carrier_langs_table---------------------------------
    
        return [
            'status' => true,
            'msg' => 'Carrier Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevCarrierLangResource(PevCarrierLangFacade::find($id));
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
        $objeto = PevCarrierLangFacade::find($id);
        $resp = new PevCarrierLangResource(PevCarrierLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Carrier Lang actualizado Correctamente.',
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
