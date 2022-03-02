<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_carriers', function (Blueprint $table) {
            $table->id();
            $table->integer('reference_id')->unsigned()->length(11);
           
            $table->unsignedBigInteger('pev_tax_rules_group_id')->unsigned()->length(11);
            $table->foreign('pev_tax_rules_group_id')->references('id')->on('pev_tax_rules_groups');

            $table->unsignedBigInteger('pev_media_id')->unsigned()->length(11);
            $table->foreign('pev_media_id')->references('id')->on('pev_media');
            $table->string('name', 64)->nullable();
            $table->string('url', 255)->nullable();
            $table->boolean('range_behavior')->default(1)->unsigned();
            $table->boolean('is_free')->default(1)->unsigned();
            $table->boolean('need_range')->default(1)->unsigned();
            $table->integer('shipping_method')->length(2);
            $table->integer('position')->unsigned()->length(11);
            $table->integer('max_width')->unsigned()->length(11);
            $table->integer('max_height')->unsigned()->length(11);
            $table->integer('max_depth')->unsigned()->length(11);
            $table->float('max_weight', 20, 6);
            $table->boolean('active')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_carriers');
    }
}
