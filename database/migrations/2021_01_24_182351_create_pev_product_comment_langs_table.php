<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductCommentLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_comment_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_comment_id')->unsigned()->length(11);
            $table->foreign('pev_product_comment_id')->references('id')->on('pev_product_comments');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('name', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('title', 64)->nullable();
            $table->text('content')->nullable();
            $table->text('respond')->nullable();
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
        Schema::dropIfExists('pev_product_comment_langs');
    }
}
