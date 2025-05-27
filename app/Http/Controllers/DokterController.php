<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::latest()->paginate(10);
        return view('admin.dokter.index', compact('dokter'));
    }

    public function about()
    {
        $dokter = Dokter::take(4)->get();
        return view('about', compact('dokter'));
    }

    public function dokters()
    {
        $dokter = Dokter::orderBy('nama')->paginate(20);
        return view('dokters', compact('dokter'));
        $query = Dokter::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        // Filter by spesialisasi
        if ($request->filled('spesialis')) {
            $query->where('spesialis', $request->spesialisasi);
        }
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'telepon' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'spesialisasi' => 'required',
            'telepon' => 'required',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}