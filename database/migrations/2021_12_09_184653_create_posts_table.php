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
            $table->foreignId('category_id')->unsigned()->constrained('categories');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('image800x549')->nullable();
            $table->string('image800x1166')->nullable();
            $table->longText('content');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('deleted_by')->unsigned()->constrained('users')->nullable();
            $table->unsignedInteger('status'); //0 for not published 1 for published
            $table->timestamps();
            $table->softDeletes();
        });
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
