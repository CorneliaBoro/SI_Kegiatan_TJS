@extends('layout.app')

@section('content')

<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        Terima kasih telah mendaftar kegiatan!
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('User.index') }}" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        @php
        $peserta = session('peserta');
        @endphp
        <a href="{{ route('bukti-daftar.show', $peserta->id) }}" class="btn btn-primary">Cetak Bukti Daftar</a>
    </div>
</div>

@endsection
