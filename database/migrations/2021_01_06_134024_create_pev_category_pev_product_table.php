<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCategoryPevProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_category_pev_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_category_id')->unsigned()->length(11);
            $table->foreign('pev_category_id')->references('id')->on('pev_product_categories');
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
            $table->integer('position')->unsigned()->length(11);
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
        Schema::dropIfExists('pev_category_pev_product');
    }
}
