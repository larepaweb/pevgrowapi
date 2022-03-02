<?php

namespace App\Classes\FaqsClass;

use App\Models\FaqModels\PevFaqCategoryLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;

class PevFaqCategoryLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevFaqCategoryLang;
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

       $register[0] = PevFaqCategoryLang::create($data);//almacenamos el la tabla pev_faq_category_pev_lans

       
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['name'], $data['text']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();

        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');
            $register[$i+1] = PevFaqCategoryLang::create([
                'pev_lang_id' => $langs_q->id,
                'pev_faqcategory_id' => $data['pev_faqcategory_id'],
                'name' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'text' => $var['resp']['traducciones'][$i]['traducciones'][1],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevFaqCategoryLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_faqcategory_id' => $data['pev_faqcategory_id'],
                'name' => $data['name'][$i],
                'text' => $data['text'][$i],
            ]);
        }
        return $register;
    }



}