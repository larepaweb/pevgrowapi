<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileIsertDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_image_zones')->delete();
        DB::statement('ALTER TABLE pev_image_zones AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('pev_image_zones')->insert([
            'name' => 'Category Product',
            'folder' => 'category/product/',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_image_zones')->insert([
            'name' => 'Product',
            'folder' => 'product/',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_image_zones')->insert([
            'name' => 'Blog Category',
            'folder' => 'blog/category/',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_image_zones')->insert([
            'name' => 'Blog Post',
            'folder' => 'blog/post/',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_image_sizes')->delete();
        DB::statement('ALTER TABLE pev_image_sizes AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $file = fopen("database/data/pev_image_sizes.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 
            DB::table('pev_image_sizes')->insert([
                'pev_image_zone_id' => $cont[$i]->pev_image_zone_id,
                'folder' => $cont[$i]->folder,
                'width' => $cont[$i]->width,
                'height' => $cont[$i]->height,
                'created_at' => $cont[$i]->created_at,
                'updated_at' => $cont[$i]->updated_at,
            ]);
        }
    }
}
