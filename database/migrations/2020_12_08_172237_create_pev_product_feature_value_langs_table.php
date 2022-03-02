<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductFeatureValueLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_feature_value_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_prod_feat_val_id')->unsigned()->length(11);
            $table->foreign('pev_prod_feat_val_id')->references('id')->on('pev_product_feature_values');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('value', 128);
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
        Schema::dropIfExists('pev_product_feature_value_langs');
    }
}
