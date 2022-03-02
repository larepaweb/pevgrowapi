<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevImageSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_image_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_image_zone_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_image_zone_id')->references('id')->on('pev_image_zones');
            $table->string('folder', 80);
            $table->string('width', 20);
            $table->string('height', 20);
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
        Schema::dropIfExists('pev_image_sizes');
    }
}
