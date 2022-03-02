<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarrierRangeWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carrier_range_weights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_carrier_id')->unsigned()->length(11);
            $table->foreign('pev_carrier_id')->references('id')->on('pev_carriers');
            $table->float('delimiter1', 20, 6);
            $table->float('delimiter2', 20, 6);
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
        Schema::dropIfExists('pev_carrier_range_weights');
    }
}
