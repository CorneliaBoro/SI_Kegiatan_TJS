@extends('Admin.dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data Laporan</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Buat Laporan Baru</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('Admin.dashboard.pesan')
    <div class="pb-3"><a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('laporan.store') }}" method="POST">
        @csrf

                            <div class="form-group">
                                <label for="id_kegiatan">Nama Kegiatan:</label>
                                <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                                    <option value="">Pilih Kegiatan</option>
                                    @foreach ($kegiatans as $id => $nama_kegiatan)
                                        <option value="{{ $id }}">{{ $nama_kegiatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="file_dokuemantasi" class="form-label">Upload Scan KTP</label>
                                <input type="file" class="form-control-file" id="file_dokumentasi" name="file_dokumentasi" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    @endsection
