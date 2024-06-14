@extends('Admin.dashboard.layout.dash-layout')
@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Laporan Kegiatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Laporan Kegiatan</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('laporan.create') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>

        </div>
    </div>
@endsection

@section('konten')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Dokumentasi Kegiatan</th>
                    <th>Daftar Peserta</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $laporans)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporans->kegiatan->nama }}</td>
                        <td>{{ $laporans->kegiatan->waktu }}</td>
                        <td>
                                <img src="{{ asset('storage/dokumentas-laporan/' . $laporans->file_dokumentasi) }}" alt="Dokumentasi Kegiatan" width="100">
                        </td>
                        <td>
                            <a href="{{route('daftarpeserta.index', ['id' => $laporans->id_kegiatan]) }}" class="btn btn-sm btn-info">Daftar Peserta</a>
                        </td>
                        <td>
                            <a href="{{ route('laporan.edit', $laporans->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="{{ route('laporan.destroy', $laporans->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>
                            
                            <a href="" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
