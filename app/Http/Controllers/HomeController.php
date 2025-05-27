<?php

namespace App\Http\Controllers;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::with('user')->latest()->take(5)->get();
        return view('home', compact('testimonis'));
    }
}