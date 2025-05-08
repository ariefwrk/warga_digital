<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warga = warga::all(); // Ambil semua data warga
        return view('warga.index', compact('warga')); // Kirim ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.create'); // Tampilkan formulir untuk menambah warga
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim melalui formulir
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nomor_rumah' => 'required|string|max:50',
        'nomor_telepon' => 'required|string|max:15',
    ]);

    // Simpan data ke database menggunakan model Warga
    Warga::create([
        'nama_lengkap' => $request->nama_lengkap,
        'nomor_rumah' => $request->nomor_rumah,
        'nomor_telepon' => $request->nomor_telepon,
    ]);

    // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warga = warga::findOrFail($id); // Ambil data warga berdasarkan ID
        return view('warga.edit', compact('warga')); // Tampilkan formulir untuk mengedit warga
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi data yang dikirim melalui formulir
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nomor_rumah' => 'required|string|max:50',
        'nomor_telepon' => 'required|string|max:15',
    ]);

    // Cari data warga berdasarkan ID
    $warga = Warga::findOrFail($id);

    // Update data warga
    $warga->update([
        'nama_lengkap' => $request->nama_lengkap,
        'nomor_rumah' => $request->nomor_rumah,
        'nomor_telepon' => $request->nomor_telepon,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data warga berdasarkan ID
        $warga = Warga::findOrFail($id);
    
        // Hapus data warga
        $warga->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}


