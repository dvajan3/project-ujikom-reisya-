<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Featured Article 1',
                'content' => 'This is a featured article content.',
                'category_id' => 1,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Featured Article 2',
                'content' => 'Another featured article content.',
                'category_id' => 1,
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Regular Article',
                'content' => 'This is a regular article content.',
                'category_id' => 1,
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
