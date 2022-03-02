<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevCustomerGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_customer_groups')->delete();
        DB::statement('ALTER TABLE pev_customer_groups AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       for ($i=0; $i < 4; $i++) { 
        DB::table('pev_customer_groups')->insert([
            'active' => 1,
            'deleted' => 0,
            'created_at' => '2020-12-02 15:14:15',
            'updated_at' => '2020-12-02 15:14:15',
        ]);
       }
        
    }
}
