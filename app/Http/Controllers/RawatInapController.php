<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\Pasien;
use Illuminate\Http\Request;

class RawatInapController extends Controller
{
    public function index()
    {
        $rawatinap = RawatInap::with('pasien')->latest()->get();
        return view('admin.rawatinap.index', compact('rawatinap'));
    }

    public function ruangan(Request $request)
    {
        $query = RawatInap::with('pasien')
            ->orderBy('tanggal_masuk', 'desc');

        // Filter pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('pasien', function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('no_rm', 'like', "%$search%");
            });
        }

        // Filter kamar
        if ($request->has('kamar')) {
            $query->where('kamar', $request->kamar);
        }

        // Filter status
        if ($request->has('status')) {
            if ($request->status == 'aktif') {
                $query->whereNull('tanggal_keluar');
            } elseif ($request->status == 'selesai') {
                $query->whereNotNull('tanggal_keluar');
            }
        }

        $rawatinap = $query->paginate(10);
        $kamar = RawatInap::distinct()->pluck('kamar')->sort();

        return view('ruangan', compact('rawatinap', 'kamar'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        return view('admin.rawatinap.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'kamar' => 'required|string|max:50',
            'status' => 'required|in:dirawat,selesai,pindah',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        RawatInap::create($request->all());

        return redirect()->route('rawatinap.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(RawatInap $rawatinap)
    {
        $pasien = Pasien::all();
        return view('admin.rawatinap.edit', compact('rawatinap', 'pasien'));
    }

    public function update(Request $request, RawatInap $rawatinap)
    {
        $request->validate([
            'pasien_id' => 'required',
            'kamar' => 'required|string|max:50',
            'status' => 'required|in:dirawat,selesai,pindah',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $rawatinap->update($request->all());

        return redirect()->route('rawatinap.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(RawatInap $rawatinap)
    {
        $rawatinap->delete();
        return redirect()->route('rawatinap.index')->with('success', 'Data berhasil dihapus');
    }
}