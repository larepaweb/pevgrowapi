<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevLangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_langs')->delete();
        DB::statement('ALTER TABLE pev_langs AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('pev_langs')->insert([
            'name' => 'Español (Spanish)',
            'language_code' => 'es-es',
            'locale' => 'es-ES',
            'date_format_lite' => 'd/m/Y',
            'date_format_full' => 'd/m/Y H:i:s',
            'iso_code' => 'es',
        ]);
        DB::table('pev_langs')->insert([
            'id' => 4,
            'name' => 'English (English)',
            'language_code' => 'en-us',
            'locale' => 'en-US',
            'date_format_lite' => 'm/d/Y',
            'date_format_full' => 'm/d/Y H:i:s',
            'iso_code' => 'en',
        ]);
        DB::table('pev_langs')->insert([
            'id' => 5,
            'name' => 'Français (French)',
            'language_code' => 'fr-fr',
            'locale' => 'fr-FR',
            'date_format_lite' => 'd/m/Y',
            'date_format_full' => 'd/m/Y H:i:s',
            'iso_code' => 'fr',
        ]);
        DB::table('pev_langs')->insert([
            'id' => 6,
            'name' => 'Deutsch (German)',
            'language_code' => 'de-de',
            'locale' => 'de-DE',
            'date_format_lite' => 'd.m.Y',
            'date_format_full' => 'd.m.Y H:i:s',
            'iso_code' => 'de',
        ]);
        DB::table('pev_langs')->insert([
            'id' => 7,
            'name' => 'Italiano (Italian)',
            'language_code' => 'it-it',
            'locale' => 'it-IT',
            'date_format_lite' => 'd/m/Y',
            'date_format_full' => 'd/m/Y H:i:s',
            'iso_code' => 'it',
        ]);
    }
}
