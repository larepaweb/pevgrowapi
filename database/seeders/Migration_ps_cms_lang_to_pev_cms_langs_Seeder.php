<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Migration_ps_cms_lang_to_pev_cms_langs_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_cms_langs')->delete();
        DB::statement('ALTER TABLE pev_cms_langs AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $file = File::get("database/data/pev_cms.json");
        // $file = json_decode($file);
        $file = fopen("database/data/pev_cms_lang.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 
            DB::table('pev_cms_langs')->insert([
                'pev_cms_id' => $cont[$i]->pev_cms_id,
                'pev_lang_id' => $cont[$i]->pev_lang_id,
                'title' => $cont[$i]->title,
                'text' => $cont[$i]->text,
                'url' => $cont[$i]->url,
                'meta_title' => $cont[$i]->meta_title,
                'meta_description' => $cont[$i]->meta_description,
                'created_at' => $cont[$i]->created_at,
                'updated_at' => $cont[$i]->updated_at,
            ]);
        }
    }
}
