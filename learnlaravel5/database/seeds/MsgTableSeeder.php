<?php

use App\Msg;
use Illuminate\Database\Seeder;

class MsgTableSeeder extends Seeder
{
    public function run()
    {
        //清空原始数据
        //DB::table('msgs')->delete();

        //创建新纪录
        Msg::create([
            'title' => 'title 1',
            'author' => 'author 1',
            'body' => 'this is the first content',
        ]);

    }

}
