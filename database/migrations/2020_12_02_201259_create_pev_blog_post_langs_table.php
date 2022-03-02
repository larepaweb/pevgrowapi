<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevBlogPostLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_blog_post_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_blog_post_id')->unsigned()->length(11);
            $table->foreign('pev_blog_post_id')->references('id')->on('pev_blog_posts');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->unsignedBigInteger('pev_media_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_media_id')->references('id')->on('pev_media');
           
            $table->string('name', 255);
            $table->text('text')->nullable();
            $table->text('richsnippet')->nullable();
            // $table->string('image', 128)->nullable();
            $table->string('url', 128)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('noindex')->default(0)->unsigned();
            $table->boolean('active_lang')->default(1)->unsigned();
            $table->dateTime('date_publish', 0)->nullable();
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
        Schema::dropIfExists('pev_blog_post_langs');
    }
}
