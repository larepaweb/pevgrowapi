<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevBlogPostLangSeeder extends Seeder
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
            DB::table('pev_blog_post_langs')->delete();
            DB::statement('ALTER TABLE pev_blog_post_langs AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_blog_post_langs.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 

               $lang_id = DB::table('pev_langs')->where('iso_code',$cont[$i]->language_code)->value('id');
                
                DB::table('pev_blog_post_langs')->insert([//Insertamos en BD los valores correspondientes
                    'id' => $cont[$i]->translation_id,
                    'pev_blog_post_id' => $cont[$i]->ID,
                    'pev_lang_id' => $lang_id,
                    'pev_media_id' => null,
                    'name' => $cont[$i]->post_title,
                    'text' => $cont[$i]->post_content,
                    'richsnippet' => null,
                    'url' => $cont[$i]->post_name,
                    'meta_title' => $cont[$i]->meta_title,
                    'meta_description' => $cont[$i]->meta_description,
                    'date_publish' => $cont[$i]->post_date,
                    'created_at' => $cont[$i]->post_date,
                    'updated_at' => $cont[$i]->post_modified,
                ]);

            }
        }
    }
}
