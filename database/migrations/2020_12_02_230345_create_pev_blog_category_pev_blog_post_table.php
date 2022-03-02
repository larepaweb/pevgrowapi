<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevBlogCategoryPevBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_blog_category_pev_blog_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_blog_category_id')->unsigned()->length(11);
            $table->foreign('pev_blog_category_id')->references('id')->on('pev_blog_categories');

            $table->unsignedBigInteger('pev_blog_post_id')->unsigned()->length(11);
            $table->foreign('pev_blog_post_id')->references('id')->on('pev_blog_posts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pev_blog_category_pev_blog_post');
    }
}
