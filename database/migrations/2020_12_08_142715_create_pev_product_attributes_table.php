<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_prod_att_group_id')->unsigned()->length(11);
            $table->foreign('pev_prod_att_group_id')->references('id')->on('pev_product_attribute_groups');
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
        Schema::dropIfExists('pev_product_attributes');
    }
}
