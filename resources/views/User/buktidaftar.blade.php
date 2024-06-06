@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Bukti Pendaftaran
        </div>
        <div class="card-body">
            <h4 class="card-title">Kegiatan: {{ $kegiatan->nama }}</h4>
            <p class="card-text">Waktu: {{ $kegiatan->waktu }}</p>
            <p class="card-text">Tempat: {{ $kegiatan->tempat }}</p>
            <hr>
            <h5 class="card-title">Data Peserta</h5>
            <p class="card-text">Nama: {{ $peserta->nama }}</p>
            <p class="card-text">NIK: {{ $peserta->nik }}</p>
            <p class="card-text">Tanggal Lahir: {{ $peserta->tgl_lahir }}</p>
            <p class="card-text">No Telp: {{ $peserta->no_hp }}</p>
            <p class="card-text">Alamat: {{ $peserta->alamat }}</p>
            {{-- <p class="card-text">Dokumen: <a href="{{ asset('storage/' . $peserta->dokumen) }}" target="_blank">Download</a></p> --}}
        </div>
    </div>
</div>
@endsection
