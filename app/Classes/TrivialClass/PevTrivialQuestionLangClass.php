<?php

namespace App\Classes\TrivialClass;

use App\Models\TrivialModels\PevTrivialQuestionLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;


class PevTrivialQuestionLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevTrivialQuestionLang;
    }

    public function traducirGuardar($data)
    {
       
        $langs = PevLang::where('id', '!=', $data['pev_lang_id'])->get('iso_code');
        
        $langs = json_decode($langs);
        $cant = sizeof($langs);
        $array_langs =[];

        for ($i=0; $i < $cant; $i++) { 
            $array_langs[$i] = strtoupper($langs[$i]->iso_code);
        }

       $register[0] = PevTrivialQuestionLang::create($data);//almacenamos el la tabla pev_faq_category_pev_lans

       
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[$data['question'], $data['answer1'], $data['answer2'], $data['answer3'], $data['answer4']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();

        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');
            $register[$i+1] = PevTrivialQuestionLang::create([
                'pev_lang_id' => $langs_q->id,
                'pev_trivial_question_id' => $data['pev_trivial_question_id'],
                'question' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'answer1' => $var['resp']['traducciones'][$i]['traducciones'][1],
                'answer2' => $var['resp']['traducciones'][$i]['traducciones'][2],
                'answer3' => $var['resp']['traducciones'][$i]['traducciones'][3],
                'answer4' => $var['resp']['traducciones'][$i]['traducciones'][4],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevTrivialQuestionLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_trivial_question_id' => $data['pev_trivial_question_id'],
                'question' => $data['question'][$i],
                'answer1' => $data['answer1'][$i],
                'answer2' => $data['answer2'][$i],
                'answer3' => $data['answer3'][$i],
                'answer4' => $data['answer4'][$i],
            ]);
        }
        return $register;
    }
}