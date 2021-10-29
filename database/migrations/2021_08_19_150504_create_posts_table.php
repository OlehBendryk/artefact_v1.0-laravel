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
            $table->unsignedInteger('subdomain_id');
            $table->unsignedTinyInteger('tag_id');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedBigInteger('moderator_id');
            $table->string('title', 255)->unique();
            $table->text('post');
            $table->boolean('is_active');
            $table->boolean('is_top');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('picture_url', 255)->nullable();

            $table->foreign('subdomain_id')->references('id')->on('subdomains');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('moderator_id')->references('id')->on('moderators');
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
