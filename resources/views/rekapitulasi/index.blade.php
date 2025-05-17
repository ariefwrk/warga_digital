@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Rekapitulasi Transaksi</h2>
        <a href="{{ route('rekapitulasi-transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    @php
        $saldo = $transaksis->reduce(function ($carry, $transaksi) {
            return $carry + ($transaksi->dana_masuk ?? 0) - ($transaksi->dana_keluar ?? 0);
        }, 0);
    @endphp

    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h3>Saldo Saat Ini: Rp {{ number_format($saldo, 0, ',', '.') }}</h3>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover rounded-top" style="overflow: hidden;">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Dana Masuk</th>
                            <th>Dana Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->tanggal }}</td>
                            <td>{{ $transaksi->deskripsi }}</td>
                            <td>{{ $transaksi->kategori }}</td>
                            <td>{{ $transaksi->dana_masuk ? 'Rp ' . number_format($transaksi->dana_masuk, 0, ',', '.') : '-' }}</td>
                            <td>{{ $transaksi->dana_keluar ? 'Rp ' . number_format($transaksi->dana_keluar, 0, ',', '.') : '-' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('rekapitulasi-transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('rekapitulasi-transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

