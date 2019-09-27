<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tweet', function (Blueprint $table) {
            $table->bigIncrements('TweetID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('User');
            $table->string('TweetText');
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
        Schema::dropIfExists('Tweet');
    }
}
