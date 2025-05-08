<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWarga;
use Illuminate\Http\Request;

class KegiatanWargaController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanWarga::all();
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
        ]);

        KegiatanWarga::create($validated);

        return redirect()->route('kegiatanwarga.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kegiatan = KegiatanWarga::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = KegiatanWarga::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
        ]);

        $kegiatan = KegiatanWarga::findOrFail($id);
        $kegiatan->update($validated);

        return redirect()->route('kegiatanwarga.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanWarga::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatanwarga.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
