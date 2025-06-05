<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwal_dokter = JadwalDokter::with('dokter')->paginate(10);
        return view('admin.jadwal.index', compact('jadwal_dokter'));
    }

    public function jadwal()
    {
        $jadwal_dokter = JadwalDokter::with('dokter')->paginate(10);
        return view('jadwal_dokter', compact('jadwal_dokter'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        return view('admin.jadwal.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal_dokter = JadwalDokter::findOrFail($id);
        $dokter = Dokter::all();
        return view('admin.jadwal.edit', compact('jadwal_dokter', 'dokter'));
    }

    public function update(Request $request, JadwalDokter $jadwal_dokter)
    {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal_dokter->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    public function destroy(JadwalDokter $jadwal_dokter)
    {
        $jadwal_dokter->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}