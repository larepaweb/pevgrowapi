<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_product_id')->unsigned()->length(11);
            $table->foreign('pev_product_id')->references('id')->on('pev_products');
            $table->unsignedBigInteger('pev_customer_id')->unsigned()->length(11);
            $table->foreign('pev_customer_id')->references('id')->on('pev_customers');
            $table->enum('type', ['question', 'comment']);
            $table->float('grade', 12, 2);
            $table->string('image', 128)->nullable();
            $table->boolean('active')->default(1)->unsigned();
            $table->string('ip', 255)->nullable();
            $table->boolean('ekomi')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_product_comments');
    }
}
