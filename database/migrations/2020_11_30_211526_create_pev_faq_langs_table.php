<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevFaqLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_faq_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_faq_id')->unsigned()->length(11);
            $table->foreign('pev_faq_id')->references('id')->on('pev_faqs');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('question');
            $table->string('answer');
            $table->boolean('active_lang')->default(1)->unsigned()->length(11);
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
        Schema::dropIfExists('pev_faq_langs');
    }
}
