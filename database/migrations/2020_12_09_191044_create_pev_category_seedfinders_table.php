<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCategorySeedfindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_category_seedfinders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_category_fem_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_category_fem_id')->references('id')->on('pev_product_categories');

            $table->unsignedBigInteger('pev_category_auto_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_category_auto_id')->references('id')->on('pev_product_categories');

            $table->unsignedBigInteger('pev_category_reg_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_category_reg_id')->references('id')->on('pev_product_categories');

            $table->unsignedBigInteger('pev_category_cbd_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_category_cbd_id')->references('id')->on('pev_product_categories');

            $table->string('seedfinder', 255);
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
        Schema::dropIfExists('pev_category_seedfinders');
    }
}
