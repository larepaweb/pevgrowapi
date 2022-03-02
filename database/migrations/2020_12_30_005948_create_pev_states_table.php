<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_country_id')->unsigned()->length(11);
            $table->foreign('pev_country_id')->references('id')->on('pev_countries');
            $table->unsignedBigInteger('pev_zone_id')->unsigned()->length(11);
            $table->foreign('pev_zone_id')->references('id')->on('pev_zones');
            $table->string('name', 64)->nullable();
            $table->string('iso_code', 7)->nullable();
            $table->boolean('active')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_states');
    }
}
