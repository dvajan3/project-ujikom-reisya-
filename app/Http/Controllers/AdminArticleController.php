<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        
        $articles = Article::with('category')
            ->when($query, function($q) use ($query) {
                $q->where('judul', 'LIKE', '%' . $query . '%')
                  ->orWhere('isi', 'LIKE', '%' . $query . '%');
            })
            ->latest()
            ->paginate(10);
            
        return view('admin.articles.index', compact('articles', 'query'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['judul', 'konten', 'id_kategori']);
        $data['id_user'] = auth()->id();
        $data['tanggal'] = now();
        $data['status'] = 'published';
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('admin.articles')->with('success', 'Article created successfully');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required|min:50',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'status' => 'required|in:draft,published,archived',
            'foto' => 'nullable|image|max:2048'
        ], [
            'isi.min' => 'Content must be at least 50 characters long.'
        ]);

        $article = Article::findOrFail($id);
        $data = $request->only(['judul', 'isi', 'id_kategori', 'status']);
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articles')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully');
    }
}