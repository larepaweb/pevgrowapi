<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarrierShippingCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carrier_shipping_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_carrier_id')->unsigned()->length(11);
            $table->foreign('pev_carrier_id')->references('id')->on('pev_carriers');

            $table->unsignedBigInteger('pev_carrier_range_price_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_carrier_range_price_id')->references('id')->on('pev_carrier_range_prices');

            $table->unsignedBigInteger('pev_carrier_range_weight_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_carrier_range_weight_id')->references('id')->on('pev_carrier_range_weights');

            $table->unsignedBigInteger('pev_zone_id')->unsigned()->length(11);
            $table->foreign('pev_zone_id')->references('id')->on('pev_zones');

            $table->float('price', 20, 6);
            $table->boolean('deleted')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_carrier_shipping_costs');
    }
}
