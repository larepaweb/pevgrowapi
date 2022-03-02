<?php

namespace App\Http\Controllers\Api\V1\ZonePaisProvincia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\ZonePaisProvinciaFacade\PevCountryLangFacade;
use App\Facade\ZonePaisProvinciaFacade\PevCountryFacade;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryLangResource;
use App\Http\Resources\ZonePaisProvinciaResource\PevCountryLangResourceCollection;

class PevCountryLangController extends Controller
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
            return new PevCountryLangResourceCollection(PevCountryLangFacade::findAll());
        }else {
            return new PevCountryLangResourceCollection(PevCountryLangFacade::forLangs($variable['por_idioma']));
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
        $cantidad[0] = sizeof($data['name']);

        $country = PevCountryFacade::create($data);

        $data['pev_country_id'] = $country->id;

        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevCountryLangResourceCollection(PevCountryLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevCountryLangResourceCollection(PevCountryLangFacade::traducirGuardar($data));

        }

        
    //------------Etapa de creacio del CountryLang con insercion en pev_faq_Country_langs_table---------------------------------
    
        return [
            'status' => true,
            'msg' => 'Country Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevCountryLangResource(PevCountryLangFacade::find($id));
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
        $objeto = PevCountryLangFacade::find($id);
        $resp = new PevCountryLangResource(PevCountryLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Country Lang actualizado Correctamente.',
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
