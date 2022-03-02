<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevBlogCategoryLangSeeder extends Seeder
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
            DB::table('pev_blog_category_langs')->delete();
            DB::statement('ALTER TABLE pev_blog_category_langs AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_blog_category_langs.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 
                
                DB::table('pev_blog_category_langs')->insert([//Insertamos en BD los valores correspondientes
                    'id' => $cont[$i]->id,
                    'pev_blog_category_id' => $cont[$i]->pev_blog_category_id,
                    'pev_lang_id' => $cont[$i]->pev_lang_id,
                    'name' => $cont[$i]->name,
                    'text' => $cont[$i]->text,
                    'url'  => $cont[$i]->url,
                    'meta_title'  => $cont[$i]->meta_title,
                    'meta_description'  => $cont[$i]->meta_description,
                    'noindex'  => $cont[$i]->noindex,
                    'active_lang'  => $cont[$i]->active_lang,
                    'created_at' => '2020-02-01 14:39:17',
                    'updated_at' => '2020-02-01 14:39:17',
                ]);

            }
        }
    }
}
