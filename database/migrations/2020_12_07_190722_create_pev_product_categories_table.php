<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('pev_product_category_id_parent')->unsigned()->length(11)->default(0);
            $table->boolean('active')->default(1)->unsigned();
            $table->boolean('important')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_product_categories');
    }
}