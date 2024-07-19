<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
           DB::table('Categories')->insert([
               'name' => 'Category ' . $i,
               'slug' => "category-$i",
               'description' => "Description for category $i",
               'created_at' => now(),
               'updated_at'=> now(),
           ]);
        }
    }
}
