@extends('Admin.dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Peserta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Peserta</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-3">Nama Kegiatan</th>
                    <th class="col-2">Daftar Peserta</th>
                    <th class="col-2">Kelola Peserta</th> <!-- Tambah kolom baru -->
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $index => $item)
                    <tr>
                        <td class="col-1">{{ $index + 1 }}</td>
                        <td class="col-3">{{ $item->nama }}</td>
                        <td class="col-2">
                            <a href="{{ route('daftarpeserta.index',['id' => $item->id]) }}" class="btn btn-sm btn-warning">Cetak Daftar Peserta</a>
                        </td>
                        <td class="col-2">
                            <a href="{{ route('kelolapeserta',['id' => $item->id]) }}" class="btn btn-sm btn-info">Kelola Peserta</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
