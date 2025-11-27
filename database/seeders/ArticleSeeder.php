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
        // Insert categories first
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Technology', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Sports', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Fashion', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Travel', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert articles
        DB::table('artikel')->insert([
            [
                'judul' => 'Latest Technology Trends in 2024',
                'isi' => 'Technology continues to evolve rapidly. In this article, we explore the latest trends that are shaping the future of technology including AI, machine learning, and quantum computing.',
                'id_kategori' => 1,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Sports Championship Results',
                'isi' => 'The latest sports championship has concluded with amazing results. Here we cover all the highlights and key moments from the tournament.',
                'id_kategori' => 2,
                'status' => 'published',
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            [
                'judul' => 'Fashion Week Highlights',
                'isi' => 'Fashion week brought us incredible designs and trends. Discover the most stunning collections and what they mean for upcoming seasons.',
                'id_kategori' => 3,
                'status' => 'published',
                'created_at' => now()->subHours(4),
                'updated_at' => now()->subHours(4),
            ],
            [
                'judul' => 'Best Travel Destinations 2024',
                'isi' => 'Planning your next vacation? Here are the top travel destinations that should be on your list for 2024, from exotic beaches to mountain adventures.',
                'id_kategori' => 4,
                'status' => 'published',
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
            [
                'judul' => 'AI Revolution in Healthcare',
                'isi' => 'Artificial Intelligence is transforming healthcare with innovative solutions for diagnosis, treatment, and patient care. Learn about the latest developments.',
                'id_kategori' => 1,
                'status' => 'published',
                'created_at' => now()->subHours(8),
                'updated_at' => now()->subHours(8),
            ],
            [
                'judul' => 'Olympic Games Preview',
                'isi' => 'Get ready for the upcoming Olympic Games with our comprehensive preview of events, athletes to watch, and predictions.',
                'id_kategori' => 2,
                'status' => 'published',
                'created_at' => now()->subHours(10),
                'updated_at' => now()->subHours(10),
            ],
        ]);
    }
}
