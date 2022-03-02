<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCacheCssJsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_cache_css_js', function (Blueprint $table) {
            $table->id();
            $table->boolean('type');
            $table->string('page', 255);
            $table->text('text');
            $table->string('compiled', 255);
            $table->timestamp('last_upd');
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
        Schema::dropIfExists('pev_cache_css_js');
    }
}
