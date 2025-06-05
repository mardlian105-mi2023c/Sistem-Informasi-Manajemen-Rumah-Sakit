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

    public function dokters(Request $request)
    {
        $query = Dokter::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('spesialis')) {
            $query->where('spesialis', $request->spesialis);
        }

        $dokter = $query->orderBy('nama')->paginate(20);
        $spesialisasi = Dokter::select('spesialis')->distinct()->pluck('spesialis');

        return view('dokters', compact('dokter', 'spesialisasi'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
            'no_telepon' => 'required',
        ]);

        Dokter::create([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'no_telepon' => $request->no_telepon,
        ]);

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
            'spesialis' => 'required',
            'no_telepon' => 'required',
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}