<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevTrivialQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_trivial_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_trivial_theme_id')->unsigned()->length(11);
            $table->foreign('pev_trivial_theme_id')->references('id')->on('pev_trivial_themes');
            $table->integer('answer_true')->unsigned()->length(4);
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
        Schema::dropIfExists('pev_trivial_questions');
    }
}
