<?php

namespace App\Http\Controllers\Api\V1\Trivial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\TrivialFacade\PevTrivialQuestionLangFacade;
use App\Facade\TrivialFacade\PevTrivialQuestionFacade;
use App\Http\Resources\TrivialResource\PevTrivialQuestionLangResource;
use App\Http\Resources\TrivialResource\PevTrivialQuestionLangResourceCollection;

class PevTrivialQuestionLangController extends Controller
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
            return new PevTrivialQuestionLangResourceCollection(PevTrivialQuestionLangFacade::findAll());
        }else {
            return new PevTrivialQuestionLangResourceCollection(PevTrivialQuestionLangFacade::forLangs($variable['por_idioma']));
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
          //--------------------Etapa de creacio del TrivialQuestion con insercion en pev_TrivialQuestion_categories_table---------------------------------
          $data = $request->all();
          $cantidad[0] = sizeof($data['question']);
          $cantidad[1] = sizeof($data['answer1']);
          $cantidad[2] = sizeof($data['answer2']);
          $cantidad[3] = sizeof($data['answer3']);
          $cantidad[4] = sizeof($data['answer4']);

  
         
          $category = PevTrivialQuestionFacade::create(['pev_trivial_theme_id' => $data['pev_trivial_theme_id'], 'answer_true' => $data['answer_true']]);
                  
      //--------------------Etapa de creacio del TrivialQuestion con insercion en pev_TrivialQuestion_categories_table---------------------------------
      
      //------------Etapa de creacio del TrivialQuestionLang con insercion en pev_TrivialQuestion_category_langs_table---------------------------------
   
          $data['pev_trivial_question_id'] = $category->id;//capta el id de la insercion en ta tabla de pev_TrivialQuestion_categories
          
          if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
              $resp = new PevTrivialQuestionLangResourceCollection(PevTrivialQuestionLangFacade::insertByLangs($data, $cantidad));
          }else {
  
              $data['question'] = $data['question'][0];//convierto este array en una variable string dentro de la clave name
              $data['answer1'] = $data['answer1'][0];
              $data['answer2'] = $data['answer2'][0];
              $data['answer3'] = $data['answer3'][0];
              $data['answer4'] = $data['answer4'][0]; 

              $resp = new PevTrivialQuestionLangResourceCollection(PevTrivialQuestionLangFacade::traducirGuardar($data));
  
          }
      //------------Etapa de creacio del TrivialQuestionLang con insercion en pev_TrivialQuestion_category_langs_table---------------------------------
      
          return [
              'status' => true,
              'msg' => 'TrivialQuestion Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevTrivialQuestionLangResource(PevTrivialQuestionLangFacade::find($id));
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
        $objeto = PevTrivialQuestionLangFacade::find($id);
        $resp = new PevTrivialQuestionLangResource(PevTrivialQuestionLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Trivial Question Lang, actualizado Correctamente.',
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
