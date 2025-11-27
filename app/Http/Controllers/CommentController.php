<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'artikel_id' => $articleId,
            'content' => $request->content,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim dan menunggu persetujuan');
    }
}