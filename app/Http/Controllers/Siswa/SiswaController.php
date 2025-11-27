<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $articles = Article::where('id_user', auth()->id())->latest()->get();
        
        // Statistics
        $totalArticles = $articles->count();
        $publishedArticles = $articles->where('status', 'published')->count();
        $draftArticles = $articles->where('status', 'draft')->count();
        $archivedArticles = $articles->where('status', 'archived')->count();
        
        return view('siswa.dashboard', compact('articles', 'totalArticles', 'publishedArticles', 'draftArticles', 'archivedArticles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('siswa.create-article', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['id_user'] = auth()->id();
        $data['status'] = 'draft';
        $data['tanggal'] = now();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('siswa.dashboard')->with('success', 'Article submitted for review');
    }

    public function edit(Article $article)
    {
        if ($article->id_user !== auth()->id()) {
            abort(403);
        }
        
        $categories = Category::all();
        return view('siswa.edit-article', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        if ($article->id_user !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['status'] = 'draft';

        if ($request->hasFile('foto')) {
            if ($article->foto) {
                Storage::disk('public')->delete($article->foto);
            }
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('siswa.dashboard')->with('success', 'Article updated and submitted for review');
    }

    public function destroy(Article $article)
    {
        if ($article->id_user !== auth()->id()) {
            abort(403);
        }

        // Only allow deletion if article is not published
        if ($article->status === 'published') {
            return redirect()->route('siswa.dashboard')->with('error', 'Cannot delete published articles');
        }

        if ($article->foto) {
            Storage::disk('public')->delete($article->foto);
        }

        $article->delete();
        return redirect()->route('siswa.dashboard')->with('success', 'Article deleted successfully');
    }

    public function profile()
    {
        return view('siswa.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . auth()->id() . ',id_user',
            'foto' => 'nullable|image|max:2048'
        ]);

        $user = auth()->user();
        $data = $request->only(['nama', 'email']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profiles', 'public');
        }

        $user->update($data);
        return redirect()->route('siswa.profile')->with('success', 'Profile updated successfully');
    }
}