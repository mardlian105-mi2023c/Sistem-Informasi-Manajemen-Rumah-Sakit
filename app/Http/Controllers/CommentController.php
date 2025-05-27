<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get(); 
        return view('home', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'komentar' => 'required',
        ]);

        Comment::create([
            'user' => $request->user,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('home')->with('success', 'Komentar berhasil ditambahkan!');
    }
}