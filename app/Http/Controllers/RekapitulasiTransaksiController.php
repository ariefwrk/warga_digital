<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekapitulasiTransaksi;

class RekapitulasiTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = RekapitulasiTransaksi::all();
        return view('rekapitulasi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekapitulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
            'kategori' => 'required|string|max:255',
            'dana_masuk' => 'nullable|numeric',
            'dana_keluar' => 'nullable|numeric',
        ]);

        RekapitulasiTransaksi::create($validated);

        return redirect()->route('rekapitulasi-transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = RekapitulasiTransaksi::findOrFail($id);
        return view('rekapitulasi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = RekapitulasiTransaksi::findOrFail($id);
        return view('rekapitulasi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'dana_masuk' => 'nullable|numeric',
            'dana_keluar' => 'nullable|numeric',
        ]);

        $transaksi = RekapitulasiTransaksi::findOrFail($id);
        $transaksi->update($validated);

        return redirect()->route('rekapitulasi-transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = RekapitulasiTransaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('rekapitulasi-transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
