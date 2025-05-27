<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $pasien = Pasien::latest()->paginate(10);
        return view('admin.pasien.index', compact('pasien'));
    }

    public function pasien(Request $request)
    {
        $query = Pasien::orderBy('nama');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                ->orWhere('no_rm', 'like', "%{$search}%");
            });
        }

        if ($request->filled('filter')) {
            $query->where('spesialis', $request->filter);
        }

        $pasien = $query->paginate(25)->withQueryString();

        return view('pasiens', compact('pasien'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_rm' => 'required|string|unique:pasien|max:20',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return view('admin.pasien.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_rm' => 'required|string|max:20|unique:pasien,no_rm,'.$pasien->id,
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'nullable|in:L,P',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        
        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil dihapus.');
    }
}