<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');
            //是否激活邮箱
            $table->smallInteger('is_active')->default(0);
            //邮箱验证token
            $table->string('confirmation_token')->default(0);

            //提了多少个问题
            $table->integer('question_count')->default(0);
            //回答了多少个问题
            $table->integer('question_count')->default(0);
            //评论数
            $table->integer('comment_count')->default(0);
            //收藏数
            $table->integer('favorites_count')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('followers_count')->default(0);
            $table->integer('following_count')->default(0);
            //个人资料
            $table->json('setting')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
