<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => '1001 Malam',
            'content' => 'Dongeng remaja',
            'image' => '1001.png',
            'user_id' => 1,
            'category_id' => 1
        ]);
    }
}
