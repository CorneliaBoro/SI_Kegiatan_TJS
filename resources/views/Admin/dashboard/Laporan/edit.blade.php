@extends('Admin.dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Edit Data Laporan</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Edit Laporan</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('Admin.dashboard.pesan')
    <div class="pb-3"><a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a></div>
    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Gunakan method PUT untuk update -->
        
        <div class="form-group">
            <label for="id_kegiatan">Nama Kegiatan:</label>
            <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                <option value="">Pilih Kegiatan</option>
                @foreach ($kegiatan as $id => $nama_kegiatan)
                    <option value="{{ $id }}" {{ $id == $laporan->id_kegiatan ? 'selected' : '' }}>{{ $nama_kegiatan }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="file_dokumentasi" class="form-label">Upload Dokumentasi</label>
            <input type="file" class="form-control" id="file_dokumentasi" name="file_dokumentasi[]" multiple required>
            @if ($laporan->file_dokumentasi)
                <p>File Dokumentasi Saat Ini: <a href="{{ asset('storage/dokumentas-laporan/' . $laporan->file_dokumentasi) }}" target="_blank">{{ $laporan->file_dokumentasi }}</a></p>
            @else
                <p>Belum ada file dokumentasi.</p>
            @endif
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
@endsection
