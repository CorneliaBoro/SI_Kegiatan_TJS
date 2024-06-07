@extends('Admin.dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Edit Data Kegiatan</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Kegiatan</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('Admin.dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datakegiatan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datakegiatan.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder=""
                value="{{ $data->nama }}">
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Pelaksanaan</label>
            <input type="datetime-local" class="form-control form-control-sm" name="waktu" id="waktu" placeholder=""
                value="{{ date('Y-m-d\TH:i', strtotime($data->waktu)) }}">
        </div>

        <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="text" class="form-control form-control-sm" name="tempat" id="tempat" placeholder=""
                value="{{ $data->tempat }}">
        </div>

        <div class="mb-3">
            <label for="id_pegawai" class="form-label">Pegawai</label>
            <select name="id_pegawai" class="form-control">
                <option class="disable" value="">---Pilih Pegawai---</option>
                @foreach ($pegawai as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $data->id_pegawai ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control form-control-sm" name="deskripsi" id="deskripsi" rows="4" placeholder="">{{ $data->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="text" class="form-control form-control-sm" name="kuota" id="kuota" placeholder=""
                value="{{ $data->kuota }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="Belum Terlaksana" {{ $data->status == 'Belum Terlaksana' ? 'selected' : '' }}>Belum Terlaksana</option>
                <option value="Sudah Terlaksana" {{ $data->status == 'Sudah Terlaksana' ? 'selected' : '' }}>Sudah Terlaksana</option>
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
@endsection
