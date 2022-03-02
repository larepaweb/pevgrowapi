<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevBlogCommentLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_blog_comment_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_blog_comment_id')->unsigned()->length(11);
            $table->foreign('pev_blog_comment_id')->references('id')->on('pev_blog_comments');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->text('comment');
            $table->dateTime('reviewed', 0)->nullable();
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
        Schema::dropIfExists('pev_blog_comment_langs');
    }
}
