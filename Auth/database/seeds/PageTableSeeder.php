<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pages')->delete();
        for ($i = 0; $i < 10; $i++) {
            Page::create([
                'title' => 'title' . $i,
                'slug' => 'slug' . $i,
                'body' => 'body' . $i,
                'user_id' => $i,
            ]);
        }
    }
}
