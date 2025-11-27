<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class PageController extends Controller
{
    public function index()
    {
        $featuredArticles = Article::where('status', 'published')->latest()->take(5)->get();
        $latestArticles = Article::where('status', 'published')->latest()->take(10)->get();
        return view('index', compact('featuredArticles', 'latestArticles'));
    }

    public function about()
    {
        return view('about');
    }

    public function category()
    {
        $categories = Category::with('articles')->get();
        return view('categori', compact('categories'));
    }

    public function latestNews()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(12);
        return view('latest_news', compact('articles'));
    }

    public function blog()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(9);
        return view('blog', compact('articles'));
    }

    public function blogDetails($id = 1)
    {
        $article = Article::findOrFail($id);
        $relatedArticles = Article::where('id_kategori', $article->id_kategori)
                                 ->where('id_artikel', '!=', $id)
                                 ->where('status', 'published')
                                 ->take(3)
                                 ->get();
        return view('blog_details', compact('article', 'relatedArticles'));
    }

    public function elements()
    {
        return view('elements');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Here you can save to database or send email
        // For now, just redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}