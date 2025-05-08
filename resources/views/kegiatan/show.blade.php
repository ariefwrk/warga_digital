@extends('layouts.dashboard')
@section('title', 'Detail Kegiatan')
@section('content')
<div class="container">
    <h1>Detail Kegiatan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
            <p class="card-text">{{ $kegiatan->deskripsi }}</p>
            <p class="card-text">Tanggal: {{ $kegiatan->tanggal }}</p>
            <p class="card-text">Lokasi: {{ $kegiatan->lokasi }}</p>
            <a href="{{ route('kegiatanwarga.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection