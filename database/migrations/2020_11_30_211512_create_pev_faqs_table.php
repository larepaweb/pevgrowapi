<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_faq_category_id')->unsigned();
            $table->foreign('pev_faq_category_id')->references('id')->on('pev_faq_categories');
            $table->boolean('active')->default(1)->unsigned();
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
        Schema::dropIfExists('pev_faqs');
    }
}
