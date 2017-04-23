<?php

use Illuminate\Support\Facades\Schema;
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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('sid', 11)->unique()->comment('学号');
            $table->string('name', 15)->comment('学生姓名');
            $table->string('password');
            $table->string('email', 50)->unique()->comment('学生邮箱');
            $table->string('status', 10)->default('正常')->comment('账号状态');
            $table->softDeletes();
            $table->index('name');
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
        Schema::dropIfExists('users');
    }
}
