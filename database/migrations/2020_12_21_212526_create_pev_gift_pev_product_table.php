<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevGiftPevProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_gift_pev_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_gift_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_gift_id')->references('id')->on('pev_gifts');

            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
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
        Schema::dropIfExists('pev_gift_pev_product');
    }
}
