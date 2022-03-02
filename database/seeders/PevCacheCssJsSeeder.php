<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PevCacheCssJsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pev_cache_css_js')->delete();
        DB::statement('ALTER TABLE pev_cache_css_js AUTO_INCREMENT=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('pev_cache_css_js')->insert([

            'type' => 0,
            'page' => 'blog-home-author',
            'text' => 'cabecera.css, blog-list.css, footer.css',
            'compiled' => 'bha4654465.css',
            'last_upd' => '2020-02-15 10:10:12',

        ]);

        DB::table('pev_cache_css_js')->insert([

            'type' => 1,
            'page' => 'blog-home-author',
            'text' => 'jquery.js, custom.js',
            'compiled' => 'bha12344423.js',
            'last_upd' => '2020-02-15 10:10:12',

        ]);


        DB::table('pev_cache_css_js')->insert([

        'type' => 0,
        'page' => 'blog-post',
        'text' => 'cabecera.css, blog-post.css, footer.css',
        'compiled' => 'bp12344423.css',
        'last_upd' => '2020-02-15 10:10:12',

        ]);

        DB::table('pev_cache_css_js')->insert([

        'type' => 1,
        'page' => 'blog-post',
        'text' => 'jquery.js, custom.js post.js',
        'compiled' => 'bp234234234.js',
        'last_upd' => '2020-02-15 10:10:12',

        ]);

        DB::table('pev_cache_css_js')->insert([

        'type' => 0,
        'page' => 'blog-calculadora',
        'text' => 'cabecera.css, calculadora.css, footer.css',
        'compiled' => 'bc2334234.css',
        'last_upd' => '2020-02-15 10:10:12',

        ]);

        DB::table('pev_cache_css_js')->insert([

        'type' => 1,
        'page' => 'blog-calculadora',
        'text' => 'jquery.js, calculadora.js',
        'compiled' => 'bc2334234.js',
        'last_upd' => '2020-02-15 10:10:12',

        ]);


    }
}
