<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevBlogPostSeeder extends Seeder
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
            DB::table('pev_blog_posts')->delete();
            DB::statement('ALTER TABLE pev_blog_posts AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_blog_posts.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 
                
                DB::table('pev_blog_posts')->insert([//Insertamos en BD los valores correspondientes
                    'id' => $cont[$i]->id,
                    'pev_admin_id' => $cont[$i]->pev_admin_id,
                    'created_at' => $cont[$i]->created_at,
                    'updated_at' => $cont[$i]->updated_at,
                ]);

            }
        }
    }
}
