<?php

namespace App\Http\Controllers\Api\V1\Trivial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\TrivialFacade\PevTrivialThemeLangFacade;
use App\Facade\TrivialFacade\PevTrivialThemeFacade;
use App\Http\Resources\TrivialResource\PevTrivialThemeLangResource;
use App\Http\Resources\TrivialResource\PevTrivialThemeLangResourceCollection;

class PevTrivialThemeLangController extends Controller
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
            return new PevTrivialThemeLangResourceCollection(PevTrivialThemeLangFacade::findAll());
        }else {
            return new PevTrivialThemeLangResourceCollection(PevTrivialThemeLangFacade::forLangs($variable['por_idioma']));
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
          //--------------------Etapa de creacio del TrivialTheme con insercion en pev_TrivialTheme_categories_table---------------------------------
          $data = $request->all();
          $cantidad[0] = sizeof($data['name']);
  
         
          $category = PevTrivialThemeFacade::create(['active' => 1]);
          
      //--------------------Etapa de creacio del TrivialTheme con insercion en pev_TrivialTheme_categories_table---------------------------------
      
      //------------Etapa de creacio del TrivialThemeLang con insercion en pev_TrivialTheme_category_langs_table---------------------------------
   
          $data['pev_trivial_theme_id'] = $category->id;//capta el id de la insercion en ta tabla de pev_TrivialTheme_categories
  
          if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
              $resp = new PevTrivialThemeLangResourceCollection(PevTrivialThemeLangFacade::insertByLangs($data, $cantidad));
          }else {
  
              $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
              $resp = new PevTrivialThemeLangResourceCollection(PevTrivialThemeLangFacade::traducirGuardar($data));
  
          }
      //------------Etapa de creacio del TrivialThemeLang con insercion en pev_TrivialTheme_category_langs_table---------------------------------
      
          return [
              'status' => true,
              'msg' => 'TrivialTheme Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevTrivialThemeLangResource(PevTrivialThemeLangFacade::find($id));
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
        $objeto = PevTrivialThemeLangFacade::find($id);
        $resp = new PevTrivialThemeLangResource(PevTrivialThemeLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Trivial Theme Lang, actualizado Correctamente.',
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
