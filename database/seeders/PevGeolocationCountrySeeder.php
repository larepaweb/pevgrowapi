<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;

class PevGeolocationCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('pev_geolocation_countries')->delete();
            DB::statement('ALTER TABLE pev_geolocation_countries AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_geolocation_countries.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 
                $country = "";
                if($cont[$i]->countrySHORT == "-"){
                    $country = null;
                }else {
                    $iso_code = Str::slug($cont[$i]->countrySHORT);
                    $country = DB::table('pev_countries')->where('iso_code', $iso_code)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.

                    if(empty($country)){
                        DB::table('pev_countries')->insert([
                            'pev_zone_id' => "10",
                            'pev_currency_id' => null,
                            'iso_code' => $cont[$i]->countrySHORT,
                            'call_prefix' => "34",
                            'active' => "1",
                            'contains_states' => "0",
                            'need_identification_number' => "1",
                            'need_zip_code' => "1",
                            'zip_code_format' => "NNNNN",
                            'display_tax_label' => "0",
                            'created_at' => '2020-02-01 14:39:17',
                            'updated_at' => '2020-02-01 14:39:17',
                        ]);
                        $iso_code = Str::slug($cont[$i]->countrySHORT);
                        $country = DB::table('pev_countries')->where('iso_code', $iso_code)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.
    
                    }
                    
                }
               
                DB::table('pev_geolocation_countries')->insert([//Insertamos en BD los valores correspondientes
                    'pev_country_id' => $country,
                    'ipfrom' => $cont[$i]->ipFROM,
                    'ipto' => $cont[$i]->ipTO,
                    'deleted' => $cont[$i]->deleted,
                    'created_at' => '2020-02-01 14:39:17',
                    'updated_at' => '2020-02-01 14:39:17',
                ]);

                unset($country); 
            }
        }
    }
}
