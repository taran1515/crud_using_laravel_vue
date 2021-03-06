<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });

        // Schema::create('comments', function (Blueprint $table) {
        //     $table->integer('post_id')->unsigned();
        //     $table->foreign('post_id')->references('id')->on('posts');
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email');
        //     $table->text('body');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
