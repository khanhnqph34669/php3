<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
    
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'user_id' => $userIds[array_rand($userIds)], // Lấy ngẫu nhiên một user_id từ mảng userIds
                'category_id' => $categoryIds[array_rand($categoryIds)], // Lấy ngẫu nhiên một category_id từ mảng categoryIds
                'title' => "Post $i",
                'content' => "Content for post $i"
            ]);
        }
    }
}
