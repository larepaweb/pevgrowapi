<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_category_id')->unsigned()->length(11);
            $table->foreign('pev_product_category_id')->references('id')->on('pev_product_categories');
            $table->unsignedBigInteger('pev_tax_rule_group_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_tax_rule_group_id')->references('id')->on('pev_tax_rules_groups');
            $table->string('ean13', 13)->nullable();
            $table->string('isbn', 32)->nullable();
            $table->string('upc', 12)->nullable();
            $table->float('price', 20, 6)->nullable();
            $table->string('reference', 64)->nullable();
            $table->float('width', 20, 6)->nullable();
            $table->float('height', 20, 6)->nullable();
            $table->float('depth', 20, 6)->nullable();
            $table->float('weight', 20, 6)->nullable();
            $table->boolean('active')->default(1)->unsigned();
            $table->boolean('available_for_order')->default(1)->unsigned();
            $table->boolean('show_price')->default(1)->unsigned();
            $table->integer('description_num_columns')->length(11)->unsigned()->nullable();
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
        Schema::dropIfExists('pev_products');
    }
}
