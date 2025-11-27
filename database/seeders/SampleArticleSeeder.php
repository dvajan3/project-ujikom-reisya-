<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class SampleArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Get first category or create one
        $category = Category::first();
        if (!$category) {
            $category = Category::create(['nama_kategori' => 'Technology']);
        }

        // Create sample approved articles
        $articles = [
            [
                'judul' => 'AI Revolution in Education',
                'isi' => 'Artificial Intelligence is transforming the way we learn and teach. From personalized learning experiences to automated grading systems, AI is making education more efficient and effective.',
                'status' => 'published',
                'id_kategori' => $category->id_kategori,
                'tanggal' => now(),
                'foto' => 'assets/img/blog/blog_1.jpg'
            ],
            [
                'judul' => 'Future of Remote Learning',
                'isi' => 'The pandemic has accelerated the adoption of remote learning technologies. Virtual classrooms, online collaboration tools, and digital assessment platforms are now essential parts of modern education.',
                'status' => 'published',
                'id_kategori' => $category->id_kategori,
                'tanggal' => now()->subDays(1),
                'foto' => 'assets/img/blog/blog_2.jpg'
            ],
            [
                'judul' => 'Digital Skills for Students',
                'isi' => 'In today\'s digital age, students need more than just traditional academic skills. Digital literacy, coding, and online communication skills are becoming increasingly important for future success.',
                'status' => 'published',
                'id_kategori' => $category->id_kategori,
                'tanggal' => now()->subDays(2),
                'foto' => 'assets/img/blog/blog_3.jpg'
            ],
            [
                'judul' => 'Sustainable Technology Trends',
                'isi' => 'Green technology and sustainable practices are becoming crucial in the tech industry. From renewable energy to eco-friendly manufacturing, technology companies are leading the way in environmental responsibility.',
                'status' => 'published',
                'id_kategori' => $category->id_kategori,
                'tanggal' => now()->subDays(3),
                'foto' => 'assets/img/blog/blog_4.jpg'
            ]
        ];

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }
    }
}