<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_products')->delete();
        DB::statement('ALTER TABLE pev_products AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $file = fopen("database/data/pev_products.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 
            
            DB::table('pev_products')->insert([
                'id' => $cont[$i]->id_product,
                'pev_product_category_id' => $cont[$i]->id_category_default,
                'pev_tax_rule_group_id' => $cont[$i]->id_tax_rules_group,
                'ean13' => $cont[$i]->ean13,
                'isbn' => $cont[$i]->isbn,
                'upc' => $cont[$i]->upc,
                'price' => $cont[$i]->price,
                'reference' => $cont[$i]->reference,
                'width' => $cont[$i]->width,
                'height' => $cont[$i]->height,
                'depth' => $cont[$i]->depth,
                'weight' => $cont[$i]->weight,
                'active' => $cont[$i]->active,
                'available_for_order' => $cont[$i]->available_for_order,
                'show_price' => $cont[$i]->show_price,
                'description_num_columns' => $cont[$i]->description_columns,
                
                'created_at' => '2020-11-30 14:39:17',
                'updated_at' => '2020-11-30 14:39:17',
            ]);
        }
    }
}
