@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Detail Transaksi</h1>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal</th>
            <td>{{ $transaksi->tanggal }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $transaksi->deskripsi }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $transaksi->kategori }}</td>
        </tr>
        <tr>
            <th>Dana Masuk</th>
            <td>{{ $transaksi->dana_masuk }}</td>
        </tr>
        <tr>
            <th>Dana Keluar</th>
            <td>{{ $transaksi->dana_keluar }}</td>
        </tr>
    </table>
    <a href="{{ route('rekapitulasi-transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection