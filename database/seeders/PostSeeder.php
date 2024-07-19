<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $faker = Faker::create('vi_VN');
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        if (empty($userIds) || empty($categoryIds)) {
            throw new \Exception('Không có user hoặc category trong database');
        }

        $posts = [];

        $thumbnails = [
            'https://picsum.photos/600/600?random=1',
            'https://picsum.photos/600/600?random=2',
            'https://picsum.photos/600/600?random=3',
            'https://picsum.photos/600/600?random=4',
            'https://picsum.photos/600/600?random=5',
            'https://picsum.photos/600/600?random=6',
            'https://picsum.photos/600/600?random=7',
            'https://picsum.photos/600/600?random=8',
            'https://picsum.photos/600/600?random=9',
            'https://picsum.photos/600/600?random=10'
        ];

        for ($i = 0; $i < 3; $i++) {
            $vietnameseTitles = [
                "Cách nấu phở ngon tại nhà",
                "10 địa điểm du lịch hấp dẫn ở Việt Nam",
                "Bí quyết học tiếng Anh hiệu quả",
                "Những món ăn đường phố nổi tiếng ở Hà Nội",
                "Cách chăm sóc cây cảnh trong nhà",
                "Top 5 bãi biển đẹp nhất miền Trung",
                "Hướng dẫn làm bánh trung thu truyền thống",
                "Lịch sử hình thành và phát triển của áo dài Việt Nam",
                "Các loại trà Việt Nam và công dụng của chúng",
                "Những lễ hội truyền thống độc đáo ở Việt Nam",
            ];
            
            $title = $faker->randomElement($vietnameseTitles);
            $posts[] = [
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'title' => $title,
                'content' => $faker->paragraphs(3, true),
                'slug' => Str::slug($title),
                'thumbnail' => $faker->randomElement($thumbnails),
                'hagtag' => "#hashtag{$i}",
                'created_at' => $faker->dateTimeBetween('now')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween('now')->format('Y-m-d H:i:s'),
                'views' => $faker->numberBetween(0, 1000),
            ];
        }

            DB::table('posts')->insert($posts);
            echo "Đã chèn thành công 10 bài post.\n";
        
    }
}
