<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarrierPevZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carrier_pev_zone', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_carrier_id')->unsigned()->length(11);
            $table->foreign('pev_carrier_id')->references('id')->on('pev_carriers');

            $table->unsignedBigInteger('pev_zone_id')->unsigned()->length(11);
            $table->foreign('pev_zone_id')->references('id')->on('pev_zones');

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
        Schema::dropIfExists('pev_carrier_pev_zone');
    }
}
