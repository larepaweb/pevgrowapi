<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_customers')->delete();
        DB::statement('ALTER TABLE pev_customers AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $file = fopen("database/data/pev_customers.json", "r");//aperturo el archiv .json desde el path donde se encuentra.
        $cont ="";
            while(!feof($file)) {

                $cont = $cont.fgets($file);//agrego linea a linea a la variable $cont hasta q llegue al final del fichero.
            }
        $cont = json_decode($cont); //convierto el string json en un array para rrecorrerolo con for.
        fclose($file); //cierro el archivo aperturado.

        $cantidad = sizeof($cont);//obtenemos el tamanio del array 

        for ($i=0; $i < $cantidad; $i++) { 
            
            if($cont[$i]->newsletter_date_add == "0000-00-00 00:00:00"){
                $newsletter_date_add = null;
            }else {
                $newsletter_date_add = $cont[$i]->newsletter_date_add;
            }
            DB::table('pev_customers')->insert([
                'id' => $cont[$i]->id_customer,
                'pev_customer_group_id' => $cont[$i]->id_default_group,
                'pev_lang_id' => $cont[$i]->id_lang,
                'company' => $cont[$i]->company,
                'siret' => $cont[$i]->siret,
                'ape' => $cont[$i]->ape,
                'firstname' => $cont[$i]->firstname,
                'lastname' => $cont[$i]->lastname,
                'email' => $cont[$i]->email,
                'email_verified_at' => '2020-11-30 14:39:17',
                'password' => $cont[$i]->passwd,
                'last_passwd_gen' => $cont[$i]->last_passwd_gen,
                'birthday' => $cont[$i]->birthday,
                'newsletter' => $cont[$i]->newsletter,
                'ip_registration_newsletter' => $cont[$i]->ip_registration_newsletter,
                'newsletter_date_add' => $newsletter_date_add,
                'secure_key' => $cont[$i]->secure_key,
                'note' => $cont[$i]->note,
                'active' => $cont[$i]->active,
                'is_guest' => $cont[$i]->is_guest,
                'deleted' => $cont[$i]->deleted,
                'remember_token' => null,
                'created_at' => '2020-11-30 14:39:17',
                'updated_at' => '2020-11-30 14:39:17',
            ]);
        }
    }
}
