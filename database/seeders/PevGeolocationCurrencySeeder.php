<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevGeolocationCurrencySeeder extends Seeder
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
            DB::table('pev_geolocation_currencies')->delete();
            DB::statement('ALTER TABLE pev_geolocation_currencies AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_geolocation_currencies.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 
                $country = DB::table('pev_countries')->where('iso_code', $cont[$i]->iso_country)->get('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.
                
                DB::table('pev_geolocation_currencies')->insert([//Insertamos en BD los valores correspondientes
                    'pev_country_id' => $country[0]->id,
                    'pev_currency_id' => $cont[$i]->pev_currency_id,
                    'deleted' => $cont[$i]->deleted,
                    'created_at' => '2020-02-01 14:39:17',
                    'updated_at' => '2020-02-01 14:39:17',
                ]);
            }
        }
    }
}
