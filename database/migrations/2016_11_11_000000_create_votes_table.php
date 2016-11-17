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
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('age')->nullable();
            $table->string('job')->nullable();
            $table->timestamps();
        });

        Schema::create('vote_details', function (Blueprint $table) {
            $table->increments('id');

            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('type')->nullable();

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('vote_id')->unsigned();
            $table->foreign('vote_id')->references('id')->on('votes');

            $table->timestamps();
        });

        Schema::create('vote_questions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('type')->nullable();

            $table->integer('vote_id')->unsigned();
            $table->foreign('vote_id')->references('id')->on('votes');

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
