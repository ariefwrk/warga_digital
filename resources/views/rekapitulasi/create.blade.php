@extends('layouts.dashboard')
@hasSection('title')
    @section('title', 'Tambah Transaksi')
@else
    @section('title', 'Tambah Transaksi')
    @section('content')
    
@endif

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('rekapitulasi-transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="iuran bulanan">Iuran Bulanan</option>
                <option value="iuran jalan">Iuran Jalan</option>
                <option value="donasi">Donasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="dana_masuk" class="form-label">Dana Masuk</label>
            <input type="number" name="dana_masuk" id="dana_masuk" class="form-control">
        </div>
        <div class="mb-3">
            <label for="dana_keluar" class="form-label">Dana Keluar</label>
            <input type="number" name="dana_keluar" id="dana_keluar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection