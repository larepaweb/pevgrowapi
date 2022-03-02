<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevProductAttributeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_product_attribute_groups', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_color_group')->default(0)->unsigned();
            $table->string('group_type', 255)->nullable();
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
        Schema::dropIfExists('pev_product_attribute_groups');
    }
}
