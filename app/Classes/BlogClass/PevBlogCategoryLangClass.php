<?php

namespace App\Classes\BlogClass;

use App\Models\BlogModels\PevBlogCategoryLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;

class PevBlogCategoryLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevBlogCategoryLang;
    }

    public function traducirGuardar($data)
    {
        // dd($data['pev_lang_id']);
        $langs = PevLang::where('id', '!=', $data['pev_lang_id'])->get('iso_code');
    
        $langs = json_decode($langs);
        $cant = sizeof($langs);
        $array_langs =[];


        for ($i=0; $i < $cant; $i++) { 
            $array_langs[$i] = strtoupper($langs[$i]->iso_code);
        }
        

       $register[0] = PevBlogCategoryLang::create($data);//almacenamos el la tabla pev_blog_category_lans

       
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['name'], $data['text'], $data['meta_title'], $data['meta_description']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();
// dd($var['resp']['traducciones'][1]['traducciones']);
        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');//obtengo el ID segun el is_code correspondiente en la tabla pev_langs.
            $register[$i+1] = PevBlogCategoryLang::create([
                'pev_lang_id' => $langs_q->id,
                'pev_blog_category_id' => $data['pev_blog_category_id'],
                'name' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'text' => $var['resp']['traducciones'][$i]['traducciones'][1],
                'url' => $data['url'],
                'meta_title' => $var['resp']['traducciones'][$i]['traducciones'][2],
                'meta_description' => $var['resp']['traducciones'][$i]['traducciones'][3],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevBlogCategoryLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_blog_category_id' => $data['pev_blog_category_id'],
                'name' => $data['name'][$i],
                'text' => $data['text'][$i],
                'url' => $data['url'],
                'meta_title' => $data['meta_title'][$i],
                'meta_description' => $data['meta_description'][$i],
            ]);
        }
        return $register;
    }
}