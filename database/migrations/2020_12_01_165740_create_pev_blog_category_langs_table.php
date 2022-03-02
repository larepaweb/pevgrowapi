<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevBlogCategoryLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_blog_category_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->unsignedBigInteger('pev_blog_category_id')->unsigned()->length(11);
            $table->foreign('pev_blog_category_id')->references('id')->on('pev_blog_categories');
            $table->string('name', 255);
            $table->text('text')->nullable();
            $table->string('url', 128);
            $table->string('meta_title', 255);
            $table->text('meta_description');
            $table->boolean('noindex')->default(0)->unsigned();
            $table->boolean('active_lang')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_blog_category_langs');
    }
}
