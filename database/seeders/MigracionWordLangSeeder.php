<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WordModels\PevWord;

class MigracionWordLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_word_langs')->delete();
        DB::statement('ALTER TABLE pev_word_langs AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $file = File::get("database/data/pev_cms.json");
        // $file = json_decode($file);
        $file = fopen("database/data/pev_word_lang.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 

            DB::table('pev_word_langs')->insert([
                'id' => $cont[$i]->id,
                'pev_word_id' => $cont[$i]->pev_word_id,
                'pev_lang_id' => $cont[$i]->pev_lang_id,
                'word' => $cont[$i]->word,
                'definition' => $cont[$i]->definition,
                'active_lang' => $cont[$i]->active_lang,
                'created_at' => "2020-11-30 14:39:17",
                'updated_at' => "2020-11-30 14:39:17",
            ]);
        }
    }
}
