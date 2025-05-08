{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\warga\index.blade.php --}}
@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Warga</h2>
        <a href="{{ route('warga.create') }}" class="btn btn-primary">Tambah Warga</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            @if($warga->isEmpty())
            <div class="alert alert-warning">
                Tidak ada data warga yang tersedia.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-striped table-hover rounded-top" style="overflow: hidden;">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Rumah</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warga as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nomor_rumah }}</td>
                            <td>{{ $item->nomor_telepon }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('warga.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
