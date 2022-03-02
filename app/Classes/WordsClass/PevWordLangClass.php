<?php

namespace App\Classes\WordsClass;

use App\Models\WordModels\PevWordLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;

class PevWordLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevWordLang;
    }

    public function ordenAlfabetico($idioma)
    {
       //$data = PevWordLang::orderBy('word', 'ASC')->get();
       $data = PevWordLang::where('pev_lang_id', $idioma)->orderBy('word', 'ASC')->get();
       return $data;
    }
    public function ordenAlfabeticoLang($idioma)
    {
       $data = PevWordLang::where('pev_lang_id', $idioma)->orderBy('word', 'ASC')->get();
       return $data;
    }

    public function ordenAlfabeticoByInitial($initial, $lang_id)
    {
       $data = PevWordLang::where('pev_lang_id', $lang_id)->orderBy('word', 'ASC')->get();

       $array = [];
       foreach ($data as $key) {
           if(strtoupper(substr($key['word'], 0, 1)) == strtoupper($initial))
           {
            $array[] = $key;
           }
           
       }
       return $array;
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

       $register[0] = PevWordLang::create($data);//almacenamos el la tabla pev_faq_category_pev_lans

        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['word'], $data['definition']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();

        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');
            $register[$i+1] = PevWordLang::create([
                'pev_lang_id' => $langs_q->id,
                'pev_word_id' => $data['pev_word_id'],
                'word' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'definition' => $var['resp']['traducciones'][$i]['traducciones'][1],
            ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevWordLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_word_id' => $data['pev_word_id'],
                'word' => $data['word'][$i],
                'definition' => $data['definition'][$i],
            ]);
        }
        return $register;
    }


    public function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);
 
		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );
 
		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );
 
		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );
 
		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );
 
		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
}