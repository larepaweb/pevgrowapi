<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_countries')->delete();
        DB::statement('ALTER TABLE pev_countries AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $file = File::get("database/data/pev_cms.json");
        // $file = json_decode($file);
        $file = fopen("database/data/pev_countries.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 

            DB::table('pev_countries')->insert([
                'id' => $cont[$i]->id,
                'pev_zone_id' => $cont[$i]->pev_zone_id,
                'pev_currency_id' => $cont[$i]->pev_currency_id,
                'iso_code' => $cont[$i]->iso_code,
                'call_prefix' => $cont[$i]->call_prefix,
                'active' => $cont[$i]->active,
                'contains_states' => $cont[$i]->contains_states,
                'need_identification_number' => $cont[$i]->need_identification_number,
                'need_zip_code' => $cont[$i]->need_zip_code,
                'zip_code_format' => $cont[$i]->zip_code_format,
                'display_tax_label' => $cont[$i]->display_tax_label,
                'created_at' => $cont[$i]->created_at,
                'updated_at' => $cont[$i]->updated_at,
            ]);
        }
    }
}
