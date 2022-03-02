<?php

namespace App\Classes\CarrierClass;

use App\Models\CarrierModels\PevCarrierLang;
use App\Models\LangModels\PevLang;
use App\Classes\BaseRepositorio\BaseRepositorioClass;
use Illuminate\Support\Facades\Http;

class PevCarrierLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrierLang;
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
        

       $register[0] = PevCarrierLang::create($data);//almacenamos el la tabla pev_Carrier__lans

       
     
        $url = 'https://lang.semillasdulces.com/api/v1/traducir_multilang_multitext_google';
        $response = Http::post($url, [
            "textos"=>[ $data['name']],
            "idioma_original"=>"",
            "idiomas_traducir"=>$array_langs
        ]);
        $var = $response->json();
// dd($var['resp']['traducciones'][1]['traducciones']);
        for ($i=0; $i < $cant; $i++) { 
            $langs_q = PevLang::where('iso_code', $var['resp']['traducciones'][$i]['idioma'])->first('id');//obtengo el ID segun el is_code correspondiente en la tabla pev_langs.
            $register[$i+1] = PevCarrierLang::create([
                'pev_lang_id' => $langs_q->id,
                'pev_carrier_id' => $data['pev_carrier_id'],
                'name' => $var['resp']['traducciones'][$i]['traducciones'][0],
                'delay' => $data['delay'],
                ]);
        }
      
        return $register; //$response->json();
    }

    public function insertByLangs($data, $cantidad)
    {
        $data['idiomas'] = [1, 4, 5, 6, 7];
        // dd($data);
        for ($i=0; $i < $cantidad[0] ; $i++) { 
            $register[$i+1] = PevCarrierLang::create([
                'pev_lang_id' => $data['idiomas'][$i],
                'pev_carrier_id' => $data['pev_carrier_id'],
                'name' => $data['name'][$i],
                'delay' => $data['delay'],
            ]);
        }
        return $register;
    }
}