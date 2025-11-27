<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard()
    {
        $pendingArticles = Article::where('status', 'draft')->latest()->get();
        $pendingComments = Comment::where('status', 'pending')->latest()->get();
        return view('guru.dashboard', compact('pendingArticles', 'pendingComments'));
    }

    public function articles()
    {
        $articles = Article::whereIn('status', ['draft', 'published'])->latest()->get();
        return view('guru.articles', compact('articles'));
    }

    public function reviewArticle(Request $request, Article $article)
    {
        $request->validate([
            'status' => 'required|in:published,draft'
        ]);

        $article->update(['status' => $request->status]);
        
        $message = $request->status === 'published' ? 'Article published successfully' : 'Article returned to draft';
        return redirect()->back()->with('success', $message);
    }

    public function comments()
    {
        $comments = Comment::with(['user', 'article'])->latest()->get();
        return view('guru.comments', compact('comments'));
    }

    public function reviewComment(Request $request, Comment $comment)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $comment->update(['status' => $request->status]);
        
        $message = $request->status === 'approved' ? 'Comment approved successfully' : 'Comment rejected';
        return redirect()->back()->with('success', $message);
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    public function profile()
    {
        return view('guru.profile', ['user' => auth()->user()]);
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
        return redirect()->route('guru.profile')->with('success', 'Profile updated successfully');
    }
}