<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $categoryName = 'Без категорії';
        $categories[] = [
            'title' => $categoryName,
            'slug' => Str::slug($categoryName),
            'parent_id' => 0
        ];

        for ($i = 0; $i < 10; $i++) {
            $categoryName = 'Категорія №' . $i;
            $categories[] = [
                'title' => $categoryName,
                'slug' => Str::slug($categoryName),
                'parent_id' => $i > 4 ? rand(1, 4) : 1
            ];
        }

        \DB::table('blog_categories')->insert($categories);
    }
}
