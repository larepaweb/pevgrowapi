<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevGeolocationCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_geolocation_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_country_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_country_id')->references('id')->on('pev_countries');
            $table->ipAddress('ipfrom');
            $table->ipAddress('ipto');
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
        Schema::dropIfExists('pev_geolocation_countries');
    }
}
