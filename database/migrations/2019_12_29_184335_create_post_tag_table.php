<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post_tag', function (Blueprint $table) {
          // $table->bigIncrements('id');
          $table->unsignedBigInteger('posts_id')->nullable();
          // $table->foreign('posts_id')->references('id')->on('posts');
          //
          $table->unsignedBigInteger('tags_id')->nullable();
          // $table->foreign('tags_id')->references('id')->on('tags');
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
        Schema::dropIfExists('post_tag');
    }
}
