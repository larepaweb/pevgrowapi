<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePevBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pev_blog_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pev_blog_category_id')->unsigned()->length(11);
            $table->foreign('pev_blog_category_id')->references('id')->on('pev_blog_categories');
            $table->unsignedBigInteger('pev_customer_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_customer_id')->references('id')->on('pev_customers');
            $table->integer('pev_blog_comment_id_parent')->unsigned()->length(11)->default(0);
            $table->unsignedBigInteger('pev_media_id')->unsigned()->length(11)->nullable();
            $table->foreign('pev_media_id')->references('id')->on('pev_media');
            $table->string('name', 128)->nullable();
            $table->string('email', 128)->nullable();
            // $table->string('image', 128)->nullable();
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
        Schema::dropIfExists('pev_blog_comments');
    }
}
