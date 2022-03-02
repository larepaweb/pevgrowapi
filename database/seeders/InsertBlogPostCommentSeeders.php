<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertBlogPostCommentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('pev_blog_categories')->insert([
            'position' => 1,
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);
        DB::table('pev_blog_category_langs')->insert([
            'pev_lang_id' => 1,
            'pev_blog_category_id' => 1,
            'name' => 'Categoria de Prueba',
            'text' => 'Esta categoria se genera desde el sistema atraves de un seeder',
            'url' => 'http://mi_seederblog.com',
            'meta_title' => 'El Gran Blog',
            'meta_description' => 'El mejor Seeder de Blog',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_blog_posts')->insert([
            'pev_admin_id' => 1,
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_blog_category_pev_blog_post')->insert([
            'pev_blog_category_id' => 1,
            'pev_blog_post_id' => 1,
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_blog_post_langs')->insert([
            'pev_blog_post_id' => 1,
            'pev_lang_id' => 1,
            'name' => 'El gran Post.',
            'text' => 'Un texto de ejemplo',
            'richsnippet' => 'prueba.',
            'url' => 'http://mi_seederblog.com',
            'meta_title' => 'El Gran Post',
            'meta_description' => 'El mejor Seeder de Post',
            'date_publish' => '2020-11-30 14:39:17',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);

        DB::table('pev_blog_comments')->insert([
            'pev_blog_category_id' => 1,
            'pev_customer_id' => 1,
            'pev_blog_comment_id_parent' => 0,
            'name' => '',
            'email' => '',
            'created_at' => '2020-11-30 14:39:17',
            'updated_at' => '2020-11-30 14:39:17',
        ]);


        for ($i=0; $i < 10 ; $i++) { 
           
            DB::table('pev_blog_comment_langs')->insert([
                'pev_blog_comment_id' => 1,
                'pev_lang_id' => 1,
                'comment' => 'Esta es la publicacion numero '.$i.' de los comentarios.',
                'reviewed' => null,
                'created_at' => '2020-11-30 14:39:17',
                'updated_at' => '2020-11-30 14:39:17',
            ]);
    
        }

        

    }
}
