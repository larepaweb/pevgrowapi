<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevAddressSeeder extends Seeder
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
            DB::table('pev_addresses')->delete();
            DB::statement('ALTER TABLE pev_addresses AUTO_INCREMENT=1;');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // $file = File::get("database/data/pev_cms.json");
            // $file = json_decode($file);
            $file = fopen("database/data/pev_addresses.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
            $cont ="";
                while(!feof($file)) {
    
                    $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
                }
            $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
            fclose($file); //cierro el archivo aperturado.
    
            $cantidad = sizeof($cont);//obtenemos el tamanio del array 
    
            for ($i=0; $i < $cantidad; $i++) { 

                DB::table('pev_addresses')->insert([//Insertamos en BD los valores correspondientes
                    'id' => $cont[$i]->id_address,
                    'pev_customer_id' => $cont[$i]->id_customer,
                    'pev_country_id' => $cont[$i]->id_country,
                    'pev_state_id' => $cont[$i]->id_state,
                    'default' => $cont[$i]->id_supplier,
                    'alias' => $cont[$i]->alias,
                    'company' => $cont[$i]->company,
                    'lastname' => $cont[$i]->lastname,
                    'firstname' => $cont[$i]->firstname,
                    'address1' => $cont[$i]->address1,
                    'address2' => $cont[$i]->address2,
                    'postcode' => $cont[$i]->postcode,
                    'city' => $cont[$i]->city,
                    'other' => $cont[$i]->other,
                    'phone' => $cont[$i]->phone,
                    'phone_mobile' => $cont[$i]->phone_mobile,
                    'vat_number' => $cont[$i]->vat_number,
                    'dni' => $cont[$i]->dni,
                    'active' => $cont[$i]->active,
                    'deleted' => $cont[$i]->deleted,
                    'created_at' => '2020-02-01 14:39:17',
                    'updated_at' => '2020-02-01 14:39:17',
                ]);

            }
        }
    }
}
