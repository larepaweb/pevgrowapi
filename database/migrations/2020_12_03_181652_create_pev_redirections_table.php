<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevRedirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_redirections', function (Blueprint $table) {
            $table->id();
            $table->string('url_old', 255);
            $table->string('url_new', 255);
            $table->enum('redirect_type', ['301', '302', '303', '304'])->default('301');
            $table->boolean('seedfinder')->default(0)->unsigned();
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
        Schema::dropIfExists('pev_redirections');
    }
}
