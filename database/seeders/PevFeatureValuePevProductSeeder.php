<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevFeatureValuePevProductSeeder extends Seeder
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
            DB::table('pev_feature_value_pev_products')->delete();
            DB::statement('ALTER TABLE pev_feature_value_pev_products AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_feature_value_pev_product.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 
                $feature = DB::table('pev_product_feature_values')->where('id', $cont[$i]->id_feature_value)->value('id');//obtengo el id de la tabla pevcountry debido a que el export tiene es el isocode del idioma.
                if($feature == ''){
                    DB::table('pev_product_feature_values')->insert([
                        'id' => $cont[$i]->id_feature_value,
                        'pev_product_feature_id' => '13',
                        'custom' => '0',
                        'position' => $cont[$i]->id_feature_value,
                        'created_at' => '2020-02-01 14:39:17',
                        'updated_at' => '2020-02-01 14:39:17',
                    ]);
                }
            }//etapa de verificacion de data faltante en pev_produc_feature_value por error causado al insertar datos de la tabla featurevalue_product que faltaban. id de feature value

            for ($i=0; $i < $cantidad; $i++) { 
                DB::table('pev_feature_value_pev_products')->insert([//Insertamos en BD los valores correspondientes
                    
                    'pev_prod_feat_val_id' => $cont[$i]->id_feature_value,
                    'pev_product_id' => $cont[$i]->id_product,
                    // 'deleted' => $cont[$i]->deleted,
                    'created_at' => '2020-02-01 14:39:17',
                    'updated_at' => '2020-02-01 14:39:17',
                ]);
            }
        }
    }
}
