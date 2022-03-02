<?php

namespace App\Http\Controllers\Api\V1\Word;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\WordFacade\PevWordLangFacade;
use App\Facade\WordFacade\PevWordFacade;
use App\Http\Resources\WordResource\PevWordLangResource;
use App\Http\Resources\WordResource\PevWordLangResourceCollection;

class PevWordLangController extends Controller
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
            // return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabetico());
            return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabetico());
        }else {
            return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabeticoLang($variable['por_idioma']));
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
         //--------------------Etapa de creacio del Word con insercion en pev_Word_categories_table---------------------------------
         $data = $request->all();
         $cantidad[0] = sizeof($data['word']);
         $cantidad[1] = sizeof($data['definition']);
 
        
         $category = PevWordFacade::create(['new' => 1]);
         
     //--------------------Etapa de creacio del Word con insercion en pev_Word_categories_table---------------------------------
     
     //------------Etapa de creacio del WordLang con insercion en pev_Word_category_langs_table---------------------------------
  
         $data['pev_word_id'] = $category->id;//capta el id de la insercion en ta tabla de pev_Word_categories
 
         if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
             $resp = new PevWordLangResourceCollection(PevWordLangFacade::insertByLangs($data, $cantidad));
         }else {
 
             $data['word'] = $data['word'][0];//convierto este array en una variable string dentro de la clave name
             $data['definition'] = $data['definition'][0];//convierto este array en una variable string dentro de la calve text
             $resp = new PevWordLangResourceCollection(PevWordLangFacade::traducirGuardar($data));
 
         }
     //------------Etapa de creacio del WordLang con insercion en pev_Word_category_langs_table---------------------------------
     
         return [
             'status' => true,
             'msg' => 'Word Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevWordLangResource(PevWordLangFacade::find($id));
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
        $objeto = PevWordLangFacade::find($id);
        $resp = new PevWordLangResource(PevWordLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Word Lang actualizado Correctamente.',
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

    public function showInitial(Request $request, $initial, $lang_id)
    {
        $body = $request->only('key_api');
        $key ='PEVkayePPqws23TsLrsZ';

        if ($body['key_api'] != $key) {
            return [
                'status' => false,
                'msg' => "Clave incorrecta.",
            ];
        }
        
        $data = PevWordLangFacade::ordenAlfabeticoLang($lang_id);
        $array = [];

        

        switch ($lang_id) {
            case '1':
                $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                break;
            case '4':
                $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
                break;
            case '5':
                $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "Æ", "À", "é", "È", "Ù", "Â", "Ê", "Î", "Ô", "Û", "Ë", "Ï", "Ü", "Ÿ", "Œ", "Ç"];
                break;
            case '6':
                $alphabet = ["A", "Ä", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "Ö", "P", "Q", "R", "S", "ẞ", "T", "U", "Ü", "V", "W", "X", "Y", "Z"];
                break;
            case '7':
                $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "Z"];
                break;
            
            default:
                # code...
                break;
        }

        foreach ($data as $key) {
           // $word = PevWordLangFacade::eliminar_acentos($key['word']);
           $word = $key['word'];

            if(strtoupper(substr($word, 0, 1)) == strtoupper($initial))
            {
             $array[] = $key;
            }
        }
        return [
            'status' => true,
            'alphabet' =>$alphabet,
            'letter_use' => strtoupper($initial),
            'data' => new PevWordLangResourceCollection($array),
        ];
    }

    public function indexForApp(Request $request)
    {
        $variable = $request->only('por_idioma');
        $body = $request->only('key_api');
    
        $key ='PEVkayePPqws23TsLrsZ';

        if ($body['key_api'] != $key) {
            return [
                'status' => false,
                'msg' => "Clave incorrecta.",
            ];
        }

        if(empty($variable['por_idioma'])){
            // return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabetico());
            return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabetico());
        }else {
            return new PevWordLangResourceCollection(PevWordLangFacade::ordenAlfabeticoLang($variable['por_idioma']));
        }
    }


    public function showForApp(Request $request, $id)
    {
        $body = $request->only('key_api');
    
        $key ='PEVkayePPqws23TsLrsZ';

        if ($body['key_api'] != $key) {
            return [
                'status' => false,
                'msg' => "Clave incorrecta.",
            ];
        }
        return new PevWordLangResource(PevWordLangFacade::find($id));
    }
}
