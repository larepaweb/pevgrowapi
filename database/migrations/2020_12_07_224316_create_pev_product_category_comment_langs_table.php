<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductCategoryCommentLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_category_comment_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_prodcatcomment_id')->unsigned()->length(11);
            $table->foreign('pev_prodcatcomment_id')->references('id')->on('pev_product_category_comments');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->unsignedBigInteger('pev_customer_id')->unsigned()->length(11);
            $table->foreign('pev_customer_id')->references('id')->on('pev_customers');
            $table->string('name', 65);
            $table->string('email', 65);
            $table->string('title', 65);
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
        Schema::dropIfExists('pev_product_category_comment_langs');
    }
}
