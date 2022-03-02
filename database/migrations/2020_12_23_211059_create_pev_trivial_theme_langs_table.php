<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevTrivialThemeLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_trivial_theme_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_trivial_theme_id')->unsigned()->length(11);
            $table->foreign('pev_trivial_theme_id')->references('id')->on('pev_trivial_themes');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('name', 255)->nullable();
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
        Schema::dropIfExists('pev_trivial_theme_langs');
    }
}
