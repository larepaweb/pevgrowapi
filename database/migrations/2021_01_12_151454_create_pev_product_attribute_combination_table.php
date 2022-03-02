<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductAttributeCombinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_attribute_combination', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_prod_att_id')->unsigned()->length(11);
            $table->foreign('pev_prod_att_id')->references('id')->on('pev_product_attributes');

            $table->unsignedBigInteger('pev_att_price_id')->unsigned()->length(11);
            $table->foreign('pev_att_price_id')->references('id')->on('pev_product_attribute_prices');
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
        Schema::dropIfExists('pev_product_attribute_combination');
    }
}
