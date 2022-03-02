<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_customer_group_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_customer_group_id')->references('id')->on('pev_customer_groups');
            $table->unsignedBigInteger('pev_lang_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_lang_id')->references('id')->on('pev_langs');

            $table->string('company')->nullable();
            $table->string('siret')->nullable();
            $table->string('ape')->nullable();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->timestamp('last_passwd_gen')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->boolean('newsletter')->default(0)->unsigned();
            $table->string('ip_registration_newsletter', 15)->nullable();
            $table->timestamp('newsletter_date_add')->nullable();
            $table->string('secure_key', 32)->default("-1");
            $table->text('note')->nullable();

            $table->boolean('active')->default(1)->unsigned();

            $table->boolean('is_guest')->default(0)->unsigned();
            $table->boolean('deleted')->default(0)->unsigned();

            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('pev_customers');
    }
}
