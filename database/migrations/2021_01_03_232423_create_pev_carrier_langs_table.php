<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarrierLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carrier_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_carrier_id')->unsigned()->length(11);
            $table->foreign('pev_carrier_id')->references('id')->on('pev_carriers');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('name', 150)->nullable();
            $table->string('delay', 150)->nullable();
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
        Schema::dropIfExists('pev_carrier_langs');
    }
}
