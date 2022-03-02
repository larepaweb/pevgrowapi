<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCategoryVisitedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_category_visiteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_customer_id')->unsigned()->length(11);
            $table->foreign('pev_customer_id')->references('id')->on('pev_customers');
            $table->unsignedBigInteger('pev_category_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_category_id')->references('id')->on('pev_product_categories');
            $table->integer('visited_num')->unsigned()->length(11);
            $table->timestamp('date_last_visited')->nullable();
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
        Schema::dropIfExists('pev_category_visiteds');
    }
}
