<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalArticles = Article::count();
        $totalCategories = Category::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $recentArticles = Article::with('category')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalArticles',
            'totalCategories', 
            'publishedArticles',
            'draftArticles',
            'recentArticles'
        ));
    }
}