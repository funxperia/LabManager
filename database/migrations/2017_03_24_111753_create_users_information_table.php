<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('uid')->unsigned()->comment('外键');
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('head',50)->nullable()->comment('头像');
            $table->string('autograph', 50)->default('还没有个性签名。。。')->comment('个性签名');
            $table->text('description')->comment('自我介绍');
            $table->string('sex', 12)->default('保密')->comment('性别');
            $table->string('phone', 11)->unique()->comment('手机号');
            $table->string('qq', 20)->comment('QQ号');
            $table->string('IDnumber', 18)->unique()->comment('身份证');
            $table->date('birthday')->comment('生日');
            $table->string('nation', 10)->comment('民族');
            $table->string('college', 15)->comment('所在学院');
            $table->string('major', 15)->comment('所在专业');
            $table->string('class', 15)->comment('所在班级');
            $table->char('category', 2)->default('本科')->comment('培养层次');
            $table->string('direction', 5)->default('探索中')->comment('学习方向');
            $table->char('enrollment', 4)->comment('入学时间');
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
        Schema::dropIfExists('users_information');
    }
}
