<?php

use Illuminate\Database\Migrations\Migration;

class CreateMsgsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msgs', function (Blueprint $table) {
            $table->increments('id'); //主键，自增
            $table->string('title'); //string类型字段
            $table->string('author');
            $table->text('body');
            $table->timestamps(); //自动创建两个字段,随时间自增
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
