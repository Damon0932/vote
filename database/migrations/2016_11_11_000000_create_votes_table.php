<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_url');
            $table->string('name');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->string('comment')->nullable();
            $table->string('email');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::drop('votes');
        Schema::drop('products');
    }
}
