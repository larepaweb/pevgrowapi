<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_image_zone_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_image_zone_id')->references('id')->on('pev_image_zones');
            $table->text('url');
            $table->string('url_amigable', 80)->nullable();
            $table->string('alt', 80)->nullable();
            $table->string('title', 180)->nullable();
            $table->string('description', 180)->nullable();
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
        Schema::dropIfExists('pev_media');
    }
}
