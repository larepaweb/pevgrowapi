<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_customer_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_customer_id')->references('id')->on('pev_customers');
            $table->unsignedBigInteger('pev_country_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_country_id')->references('id')->on('pev_countries');
            $table->unsignedBigInteger('pev_state_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_state_id')->references('id')->on('pev_states');
            $table->boolean('default')->default(0)->unsigned();
            $table->string('alias', 32);
            $table->string('company', 255)->nullable();
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('address1', 128);
            $table->string('address2', 128);
            $table->string('postcode', 12)->nullable();
            $table->string('city', 64);
            $table->text('other')->nullable();
            $table->string('phone', 32)->nullable();
            $table->string('phone_mobile', 32)->nullable();
            $table->string('vat_number', 32)->nullable();
            $table->string('dni', 16);
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
        Schema::dropIfExists('pev_addresses');
    }
}
