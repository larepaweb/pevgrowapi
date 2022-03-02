<?php

namespace App\Http\Controllers\Api\V1\TextoEstatico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextoEstaticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $file = fopen("pev_cms.json", "r");
        // $cont ="";
        //     while(!feof($file)) {

        //         $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
        //     }
        // $cont = json_decode($cont);
        // fclose($file);

        // dd($cont);
        // return $cont;

        $file = fopen("database/data/pev_geolocation_countries_01.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        $country = "";
            if($cont[$i]->countrySHORT == "-"){
                $country = null;
            }else {
                $iso_code = Str::slug($cont[$i]->countrySHORT);
                $country = DB::table('pev_countries')->where('iso_code', $iso_code)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.
            }

            dd($country);

        // for ($i=0; $i < $cantidad; $i++) { 
        //     $country = "";
        //     if($cont[$i]->countrySHORT == "-"){
        //         $country = null;
        //     }else {
        //         $iso_code = Str::slug($cont[$i]->countrySHORT);
        //         $country = DB::table('pev_countries')->where('iso_code', $iso_code)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.

        //         if(empty($country[0]->id)){
        //             DB::table('pev_countries')->insert([
        //                 'pev_zone_id' => "10",
        //                 'pev_currency_id' => null,
        //                 'iso_code' => $cont[$i]->countrySHORT,
        //                 'call_prefix' => "34",
        //                 'active' => "1",
        //                 'contains_states' => "0",
        //                 'need_identification_number' => "1",
        //                 'need_zip_code' => "1",
        //                 'zip_code_format' => "NNNNN",
        //                 'display_tax_label' => "0",
        //                 'created_at' => '2020-02-01 14:39:17',
        //                 'updated_at' => '2020-02-01 14:39:17',
        //             ]);
        //             $iso_code = Str::slug($cont[$i]->countrySHORT);
        //             $country = DB::table('pev_countries')->where('iso_code', $iso_code)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.

        //         }
                
        //     }
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        //Ejemplo aprenderaprogramar.com

        //$file = fopen("archivo.txt", "r");
        $file = fopen("archivo.json", "w");

        

        // echo fgets($file). "<br />";
        fwrite($file, '{"nombre": "abrahan"}');

    

        fclose($file);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $file = fopen("pev_feature_value_pev_product.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 

            // dd($cont);

            for ($i=0; $i < 11; $i++) { 
                $feature[$i] = DB::table('pev_product_feature_values')->where('id', $cont[$i]->id_feature_value)->value('id');
            }
        //$feature = DB::table('pev_product_feature_values')->where('id', $id)->value('id');
        

        // if($feature ==''){
        //     return 'nada';
        // }
        return $feature;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
