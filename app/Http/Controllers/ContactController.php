<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;

class ContactController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'created_at')->get();
        $comments = Comment::with('user:id,name,email')->latest()->get();
        
        return view('admin.contacts', compact('users', 'comments'));
    }
}