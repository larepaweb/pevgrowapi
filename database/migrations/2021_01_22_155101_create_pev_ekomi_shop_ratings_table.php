<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevEkomiShopRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_ekomi_shop_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->integer('number_of_ratings')->unsigned()->length(11);
            $table->float('exact_average', 20, 6);
            $table->float('rounded_average', 20, 6);
            $table->string('seal', 100)->nullable();
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
        Schema::dropIfExists('pev_ekomi_shop_ratings');
    }
}
