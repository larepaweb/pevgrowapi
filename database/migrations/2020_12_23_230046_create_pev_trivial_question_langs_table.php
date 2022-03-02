<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevTrivialQuestionLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_trivial_question_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_trivial_question_id')->unsigned()->length(11);
            $table->foreign('pev_trivial_question_id')->references('id')->on('pev_trivial_questions');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->string('question', 255)->nullable();
            $table->text('answer1')->nullable();
            $table->text('answer2')->nullable();
            $table->text('answer3')->nullable();
            $table->text('answer4')->nullable();
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
        Schema::dropIfExists('pev_trivial_question_langs');
    }
}
