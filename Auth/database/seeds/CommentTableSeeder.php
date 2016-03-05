<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->delete();
        for ($i = 1; $i < 4; $i++) {
            Comment::create([
                'nickname' => 'nickname' . $i,
                'email' => 'email' . $i . '@123.com',
                'website' => 'www.12' . $i . '.com',
                'content' => 'content ' . $i,
                'page_id' => $i,
            ]);
        }
    }
}
