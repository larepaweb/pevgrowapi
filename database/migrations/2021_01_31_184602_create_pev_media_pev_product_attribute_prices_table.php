<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevMediaPevProductAttributePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_media_pev_product_attribute_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_media_id')->unsigned()->length(11);
            $table->foreign('pev_media_id')->references('id')->on('pev_media');
            $table->unsignedBigInteger('pev_att_price_id')->unsigned()->length(11);
            $table->foreign('pev_att_price_id')->references('id')->on('pev_product_attribute_prices');
            $table->boolean('principal')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_media_pev_product_attribute_prices');
    }
}
