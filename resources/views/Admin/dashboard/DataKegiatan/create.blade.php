@extends('Admin.dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data Kegiatan</h5>
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
    <form action="{{ route('datakegiatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder=""
                value="{{ Session::get('nama') }}">
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Pelaksanaan</label>
            <input type="datetime-local" class="form-control form-control-sm" name="waktu" id="waktu" placeholder=""
                value="{{ Session::get('waktu') }}">
        </div>

        <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="tempat" class="form-control form-control-sm" name="tempat" id="tempat" placeholder=""
                value="{{ Session::get('tempat') }}">
        </div>

        <div class="col-mb-3">
            <select name="id_pegawai" class="form-control">
                <option class="disable" value="">---Pilih Pegawai---</option>
                @foreach ($pegawai as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control form-control-sm" name="deskripsi" id="deskripsi" rows="4" placeholder="">
                {{ Session::get('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="kuota" class="form-control form-control-sm" name="kuota" id="kuota" placeholder="" value="{{ Session::get('kuota') }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"
                name="status">
              <option selected="selected">Belum Terlaksana</option>
              <option>Sudah Terlaksana</option>
            </select>
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
