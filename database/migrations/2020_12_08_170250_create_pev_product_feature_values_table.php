<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductFeatureValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_feature_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_feature_id')->unsigned()->length(11);
            $table->foreign('pev_product_feature_id')->references('id')->on('pev_product_features');
            $table->boolean('custom')->default(1)->unsigned();
            $table->integer('position')->unsigned()->length(11);
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
        Schema::dropIfExists('pev_product_feature_values');
    }
}
