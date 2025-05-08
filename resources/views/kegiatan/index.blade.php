@extends('layouts.dashboard')
@section('title', 'Daftar Kegiatan')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kegiatan</h2>
        <a href="{{ route('kegiatanwarga.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover rounded-top" style="overflow: hidden;">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatan as $item)
                        <tr>
                            <td>{{ $item->nama_kegiatan }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('kegiatanwarga.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('kegiatanwarga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kegiatanwarga.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
