<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCmsLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_cms_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_cms_id')->unsigned()->length(11);
            $table->foreign('pev_cms_id')->references('id')->on('pev_cms');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('title', 255)->nullable();
            $table->text('text')->nullable();
            $table->string('url', 128)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('noindex')->default(0)->unsigned();
            $table->boolean('active_lang')->default(1)->unsigned();
            $table->boolean('ignore_lang')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_cms_langs');
    }
}
