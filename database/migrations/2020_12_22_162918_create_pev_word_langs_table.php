<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevWordLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_word_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_word_id')->unsigned()->length(11);
            $table->foreign('pev_word_id')->references('id')->on('pev_words');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('word', 255)->nullable();
           // $table->string('definition', 255)->nullable();
            $table->text('definition')->nullable();
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
        Schema::dropIfExists('pev_word_langs');
    }
}
