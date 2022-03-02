<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevProductFeaturevalueLangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_product_feature_value_langs')->delete();
        DB::statement('ALTER TABLE pev_product_feature_value_langs AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $file = File::get("database/data/pev_cms.json");
        // $file = json_decode($file);
        $file = fopen("database/data/pev_product_feature_value_langs.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 


        
        for ($i=0; $i < $cantidad; $i++) { 
            $feauture_value = DB::table('pev_product_feature_values')->where('id', $cont[$i]->pev_prod_feat_val_id)->value('id');
            if($feauture_value == null){
                DB::table('pev_product_feature_values')->insert([
                    'id' => $cont[$i]->pev_prod_feat_val_id,
                    'pev_product_feature_id' => '50',
                    'custom' => '0',
                    'position' => $cont[$i]->pev_prod_feat_val_id,
                    'deleted' => '0',
                    'created_at' => $cont[$i]->created_at,
                    'updated_at' => $cont[$i]->updated_at,
                ]);
            }
        }

        for ($i=0; $i < $cantidad; $i++) { 
            DB::table('pev_product_feature_value_langs')->insert([
                'id' => $cont[$i]->id,
                'pev_prod_feat_val_id' => $cont[$i]->pev_prod_feat_val_id,
                'pev_lang_id' => $cont[$i]->pev_lang_id,
                'value' => $cont[$i]->value,
                'created_at' => $cont[$i]->created_at,
                'updated_at' => $cont[$i]->updated_at,
            ]);
        }
        
    }
}
