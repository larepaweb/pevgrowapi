<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevTaxRulesGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_tax_rules_groups')->delete();
        DB::statement('ALTER TABLE pev_tax_rules_groups AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        for ($i=0; $i < 14; $i++) { 
            DB::table('pev_tax_rules_groups')->insert([
           
                'name' => 'Test de Taxt',
                'created_at' => "2020-11-30 14:39:17",
                'updated_at' => "2020-11-30 14:39:17",
            ]);
        }
        
    }
}
