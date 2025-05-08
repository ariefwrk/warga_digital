{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\warga\edit.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Edit Data Warga')

@section('header-title', 'Edit Data Warga')

@section('content')
<div class="container">
    <h4 class="mb-3">Form Edit Data Warga</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Laravel menggunakan method PUT untuk update --}}
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ $warga->nama_lengkap }}" required>
        </div>
        <div class="mb-3">
            <label for="nomor_rumah" class="form-label">Nomor Rumah</label>
            <input type="text" name="nomor_rumah" id="nomor_rumah" class="form-control" value="{{ $warga->nomor_rumah }}" required>
        </div>
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ $warga->nomor_telepon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection