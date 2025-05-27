<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Terima kasih atas testimoni Anda!');
    }
}