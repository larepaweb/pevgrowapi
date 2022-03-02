<?php

namespace App\Classes\FaqsClass;

use App\Models\FaqModels\PevFaqLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;


class PevFaqLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevFaqLang;
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

       $register[0] = PevFaqLang::create([
            'pev_faq_id' => $data['pev_faq_id'],
            'pev_lang_id' => $data['pev_lang_id'],
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['question'], $data['answer']],
            "idioma_original"=>"ES",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();
      
        //dd($var['resp']['traducciones'][0]['traducciones']);
        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');
            $register[$i+1] = PevFaqLang::create([
                'pev_faq_id' => $data['pev_faq_id'],
                'pev_lang_id' => $langs_q->id,
                'question' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'answer' => $var['resp']['traducciones'][$i]['traducciones'][1],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function forCategoryLangs($lang_id, $category_id)
    {
        return PevFaqLang::where('pev_lang_id', $lang_id)->where('pev_category_id', $lang_id)->paginate(2);
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevFaqLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_faq_id' => $data['pev_faq_id'],
                'question' => $data['question'][$i],
                'answer' => $data['answer'][$i],
            ]);
        }
        return $register;
    }

    
}
