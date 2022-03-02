<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('name', 255);
            $table->text('text_intro')->nullable();
            $table->text('text_short')->nullable();
            $table->text('text')->nullable();
            $table->text('video')->nullable();
            $table->string('url', 255);
            $table->string('meta_title', 255);
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('pev_product_langs');
    }
}
