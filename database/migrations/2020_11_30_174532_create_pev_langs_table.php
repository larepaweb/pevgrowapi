<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_langs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->boolean('active')->default(1)->unsigned();
            $table->string('language_code', 5);
            $table->string('locale', 5);
            $table->string('date_format_lite', 30);
            $table->string('date_format_full', 30);
            $table->string('iso_code', 2);
            $table->boolean('is_rtl')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_langs');
    }
}
