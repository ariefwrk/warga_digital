{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\warga\create.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Tambah Data Warga')

@section('header-title', 'Tambah Data Warga')

@section('content')
<div class="container">
    <h4 class="mb-3">Form Tambah Data Warga</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warga.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
            <label for="nomor_rumah" class="form-label">Nomor Rumah</label>
            <input type="text" name="nomor_rumah" id="nomor_rumah" class="form-control" placeholder="Masukkan nomor rumah" required>
        </div>
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="Masukkan nomor telepon" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection