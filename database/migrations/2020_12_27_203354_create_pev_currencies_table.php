<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->nullable();
            $table->string('iso_code', 3)->nullable();
            $table->float('conversion_rate', 13, 6);
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
        Schema::dropIfExists('pev_currencies');
    }
}
