<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;

class PevProductLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductLang;
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

       $register[0] = PevProductLang::create($data);//almacenamos el la tabla pev_faq_category_pev_lans

       
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['name'], $data['text_intro'], $data['text_short'], $data['text'], $data['meta_title'], $data['meta_description']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();

        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');
            $register[$i+1] = PevProductLang::create([
                'pev_product_id' => $data['pev_product_id'],
                'pev_lang_id' => $langs_q->id,
                'name' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'text_intro' => $var['resp']['traducciones'][$i]['traducciones'][1],
                'text_short' => $var['resp']['traducciones'][$i]['traducciones'][2],
                'text' => $var['resp']['traducciones'][$i]['traducciones'][3],
                'video' => $data['video'],
                'url' => $data['url'],
                'meta_title' => $var['resp']['traducciones'][$i]['traducciones'][4],
                'meta_description' => $var['resp']['traducciones'][$i]['traducciones'][5],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevProductLang::create([
                'pev_product_id' => $data['pev_product_id'],
                'pev_lang_id' => $data['idiomas'][$i],
                'name' => $data['name'][$i],
                'text_intro' => $data['text_intro'][$i],
                'text_short' => $data['text_short'][$i],
                'text' => $data['text'][$i],
                'video' => $data['video'],
                'url' => $data['url'],
                'meta_title' => $data['meta_title'][$i],
                'meta_description' => $data['meta_description'][$i],
  
            ]);
        }
        return $register;
    }
}