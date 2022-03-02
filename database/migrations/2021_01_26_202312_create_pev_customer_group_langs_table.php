<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCustomerGroupLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_customer_group_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_customer_group_id')->unsigned()->length(11);
            $table->foreign('pev_customer_group_id')->references('id')->on('pev_customer_groups');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('name', 255);
            $table->boolean('active_lang')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_customer_group_langs');
    }
}
