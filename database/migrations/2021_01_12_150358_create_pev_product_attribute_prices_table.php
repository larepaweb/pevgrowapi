<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductAttributePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_attribute_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
            $table->string('reference', 64)->nullable();
            $table->string('ean13', 13)->nullable();
            $table->string('isbn', 32)->nullable();
            $table->string('upc', 12)->nullable();
            $table->float('price', 20, 6)->nullable();
            $table->string('ecotax', 64)->nullable();
            $table->float('quantity', 20, 6)->nullable();
            $table->float('weight', 20, 6)->nullable();
            $table->float('unit_price_impact', 20, 6)->nullable();
            $table->float('minimal_quantity', 20, 6)->nullable();
            $table->boolean('default_on')->default(1)->unsigned();
            $table->dateTime('available_date', 0)->nullable();
            $table->boolean('active')->default(1)->unsigned();
            $table->boolean('deleted')->default(0)->unsigned();
           // $table->boolean('deleted')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_product_attribute_prices');
    }
}
