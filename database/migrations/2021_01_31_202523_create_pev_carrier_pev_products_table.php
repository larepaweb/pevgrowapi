<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarrierPevProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carrier_pev_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_carrier_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_carrier_id')->references('id')->on('pev_carriers');
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
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
        Schema::dropIfExists('pev_carrier_pev_products');
    }
}
