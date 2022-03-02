<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_zone_id')->unsigned()->length(11);
            $table->foreign('pev_zone_id')->references('id')->on('pev_zones');
            $table->unsignedBigInteger('pev_currency_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_currency_id')->references('id')->on('pev_currencies');
            $table->string('iso_code', 3)->nullable();
            $table->integer('call_prefix')->unsigned()->length(11);
            $table->boolean('active')->default(1)->unsigned();
            $table->boolean('contains_states')->default(1)->unsigned();
            $table->boolean('need_identification_number')->default(1)->unsigned();
            $table->boolean('need_zip_code')->default(1)->unsigned();
            $table->string('zip_code_format', 12)->nullable();
            $table->boolean('display_tax_label')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_countries');
    }
}
