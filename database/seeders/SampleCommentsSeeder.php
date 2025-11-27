<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Article;
use App\Models\User;

class SampleCommentsSeeder extends Seeder
{
    public function run(): void
    {
        $article = Article::first();
        $user = User::where('role', 'user')->first();
        
        if ($article && $user) {
            Comment::create([
                'user_id' => $user->id_user,
                'artikel_id' => $article->id_artikel,
                'content' => 'Great article! Very informative and well written.',
                'status' => 'approved'
            ]);
            
            Comment::create([
                'user_id' => $user->id_user,
                'artikel_id' => $article->id_artikel,
                'content' => 'Thanks for sharing this valuable information.',
                'status' => 'approved'
            ]);
        }
    }
}