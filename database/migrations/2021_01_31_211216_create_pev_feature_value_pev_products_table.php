<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevFeatureValuePevProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_feature_value_pev_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_prod_feat_val_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_prod_feat_val_id')->references('id')->on('pev_product_feature_values');
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
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
        Schema::dropIfExists('pev_feature_value_pev_products');
    }
}
