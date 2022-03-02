<?php

namespace App\Http\Controllers\Api\V1\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CMSFacade\PevCMSLangFacade;
use App\Facade\CMSFacade\PevCMSFacade;
use App\Http\Resources\CMSResource\PevCMSLangResource;
use App\Http\Resources\CMSResource\PevCMSLangResourceCollection;
use App\Http\Requests\CMSRequest\StorePevCMSLangRequest;
use App\Http\Requests\CMSRequest\UpdatePevCMSLangRequest;

class PevCMSLangController extends Controller
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
            return new PevCMSLangResourceCollection(PevCMSLangFacade::findAll());
        }else {
            return new PevCMSLangResourceCollection(PevCMSLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevCMSLangRequest $request)
    {
        $data = $request->validated();
        $cantidad[0] = sizeof($data['title']);
        $cantidad[1] = sizeof($data['text']);
        $cantidad[2] = sizeof($data['meta_title']);
        $cantidad[3] = sizeof($data['meta_description']);
        //--------------------Etapa de creacio del CMS con insercion en pev_faq_categories_table---------------------------------

        $cms = PevCMSFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        if(empty($cms)){//Verifico si la tabla esta vacia.
            $cms = PevCMSFacade::create(['position' => 1]);
        }else {
            $cms = PevCMSFacade::create(['position' => $cms->id+1]);
        }
    //--------------------Etapa de creacio del CMS con insercion en pev_faq_categories_table---------------------------------

    //------------Etapa de creacio del CMSLang con insercion en pev_faq_category_langs_table---------------------------------


        $data['pev_cms_id'] = $cms->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevCMSLangResourceCollection(PevCMSLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['title'] = $data['title'][0];//convierto este array en una variable string dentro de la clave name
            $data['text'] = $data['text'][0];//convierto este array en una variable string dentro de la calve text
            $data['meta_title'] = $data['meta_title'][0];
            $data['meta_description'] = $data['meta_description'][0];
            $resp = new PevCMSLangResourceCollection(PevCMSLangFacade::traducirGuardar($data));

        }


    //------------Etapa de creacio del CMSLang con insercion en pev_faq_cms_langs_table---------------------------------

        return [
            'status' => true,
            'msg' => 'CMS Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevCMSLangResource(PevCMSLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevCMSLangRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCMSLangFacade::find($id);
        $resp = new PevCMSLangResource(PevCMSLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'CMS Lang actualizado Correctamente.',
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
