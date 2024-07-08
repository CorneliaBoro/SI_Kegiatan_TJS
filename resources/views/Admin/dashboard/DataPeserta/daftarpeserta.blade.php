<!-- resources/views/daftar_peserta/index.blade.php -->
@extends('Admin.dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Peserta {{ $kegiatan->nama }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Peserta</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="" class="btn btn-primary">Tambah Data Peserta</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Dokumen</th>
                <th>Tanggal Pendaftaran</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $index => $pesertas)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pesertas->nama }}</td>
                <td>{{ $pesertas->nik }}</td>
                <td>{{ $pesertas->tgl_lahir }}</td>
                <td>{{ $pesertas->no_hp }}</td>
                <td>{{ $pesertas->alamat }}</td>
                <td>
                   <img src="{{ asset('storage/dokumen-ktp/' . $pesertas->dokumen) }}" alt="" width="130">
                </td>
                <td>{{ $pesertas->created_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <form action="" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="" class="btn btn-sm btn-primary">Cetak</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
