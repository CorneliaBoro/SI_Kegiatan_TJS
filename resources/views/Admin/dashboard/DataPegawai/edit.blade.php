@extends('Admin.dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Data Pegawai</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('Admin.dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datapegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datapegawai.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control form-control-sm" name="nip" id="nip" value="{{ $data->nip }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $data->email }}">
        </div>        
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" value="{{ $data->no_hp }}">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
