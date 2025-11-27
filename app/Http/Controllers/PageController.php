<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class PageController extends Controller
{
    public function home()
    {
        $articles = Article::with('category')->where('status', 'published')->latest()->take(9)->get();
        $categories = Category::all();
        return view('home', compact('articles', 'categories'));
    }

    public function categori()
    {
        $categories = Category::with(['articles' => function($query) {
            $query->where('status', 'published');
        }])->get();
        return view('categori', compact('categories'));
    }

    public function blog()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(9);
        return view('blog', compact('articles'));
    }

    public function blogDetails($id)
    {
        $article = Article::with(['comments.user', 'approvedComments.user'])->findOrFail($id);
        $relatedArticles = Article::where('id_kategori', $article->id_kategori)
            ->where('id_artikel', '!=', $id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
        return view('blog_details', compact('article', 'relatedArticles'));
    }

    public function categoryArticles($id)
    {
        $category = Category::findOrFail($id);
        $articles = Article::where('id_kategori', $id)
            ->where('status', 'published')
            ->latest()
            ->paginate(9);
        return view('category-articles', compact('category', 'articles'));
    }

    public function latest()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(12);
        return view('latest', compact('articles'));
    }

    public function latestNews()
    {
        $articles = Article::where('status', 'published')->latest()->paginate(12);
        return view('latest_news', compact('articles'));
    }

    public function category()
    {
        $categories = Category::with(['articles' => function($query) {
            $query->where('status', 'published')->latest();
        }])->get();
        return view('category', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query) || trim($query) === '') {
            return redirect()->route('home');
        }

        $articles = Article::where('status', 'published')
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', '%' . $query . '%')
                  ->orWhere('konten', 'LIKE', '%' . $query . '%');
            })
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('search-results', compact('articles', 'query'));
    }
}