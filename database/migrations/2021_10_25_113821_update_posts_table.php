<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->renameColumn('post', 'post_raw');
            $table->text('post_html')->after('post');
            $table->text('excerpt')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->renameColumn('post_raw', 'post');
            $table->dropColumn('post_html');
            $table->dropColumn('excerpt');
        });
    }
}

