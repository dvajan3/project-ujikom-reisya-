<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Category::create($request->all());
        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,siswa,guru,user'
        ]);

        $user->update(['role' => $request->role]);
        return redirect()->back()->with('success', 'User role updated successfully');
    }

    public function articles()
    {
        $articles = Article::with(['category', 'user'])->orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function editArticle($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'status' => 'required|in:draft,published,archived',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $article = Article::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($article->foto && !str_starts_with($article->foto, 'assets/')) {
                Storage::disk('public')->delete($article->foto);
            }
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articles')->with('success', 'Article updated successfully');
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        
        if ($article->foto && !str_starts_with($article->foto, 'assets/')) {
            Storage::disk('public')->delete($article->foto);
        }
        
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully');
    }
}