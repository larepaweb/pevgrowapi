<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_admins')->delete();
        DB::statement('ALTER TABLE pev_admins AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('pev_admins')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_admins')->insert([
            'id' => '2',
            'firstname' => 'Alan',
            'lastname' => 'Martínez',
            'email' => 'alan@martinez.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_admins')->insert([
            'id' => '4',
            'firstname' => 'Alan',
            'lastname' => 'Martínez',
            'email' => 'alan@martinez2.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_admins')->insert([
            'id' => '9',
            'firstname' => 'Mario',
            'lastname' => 'Soriano',
            'email' => 'mario@soriano.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_admins')->insert([
            'id' => '10',
            'firstname' => 'Noelia',
            'lastname' => 'Jiménez',
            'email' => 'noelia@jimenez.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_admins')->insert([
            'id' => '12',
            'firstname' => 'Fran',
            'lastname' => 'Quesada',
            'email' => 'fran@quesada.com',
            'email_verified_at' => '2020-12-02 15:14:15',
            'password' => 'pev123456',
            'active' => '1',
            'remember_token' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);
    }
}
