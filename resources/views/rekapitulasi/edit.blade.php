@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>
    <form action="{{ route('rekapitulasi-transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $transaksi->deskripsi }}">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $transaksi->kategori }}" required>
        </div>
        <div class="mb-3">
            <label for="dana_masuk" class="form-label">Dana Masuk</label>
            <input type="number" name="dana_masuk" id="dana_masuk" class="form-control" value="{{ $transaksi->dana_masuk }}">
        </div>
        <div class="mb-3">
            <label for="dana_keluar" class="form-label">Dana Keluar</label>
            <input type="number" name="dana_keluar" id="dana_keluar" class="form-control" value="{{ $transaksi->dana_keluar }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection