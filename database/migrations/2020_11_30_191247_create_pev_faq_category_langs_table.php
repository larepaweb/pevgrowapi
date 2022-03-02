<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevFaqCategoryLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_faq_category_langs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11);
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');
            $table->unsignedBigInteger('pev_faqcategory_id')->unsigned()->length(11);
            $table->foreign('pev_faqcategory_id')->references('id')->on('pev_faq_categories');
            $table->string('name', 255);
            $table->text('text')->nullable();
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
        Schema::dropIfExists('pev_faq_category_langs');
    }
}
