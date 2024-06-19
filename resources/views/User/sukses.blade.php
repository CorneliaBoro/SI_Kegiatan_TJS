@extends('layout.app')

@section('content')
<div class="container center-screen">
    <div class="alert-custom">
        <i class="fa-solid fa-circle-check"></i>
        <h1>Terima kasih telah mendaftar kegiatan!</h1>
        <div class="btn-group">
            <a href="{{ route('User.index') }}" class="btn btn-secondary">Kembali ke Halaman Utama</a>
            @php
            $peserta = session('peserta');
            @endphp
           <a href="{{ route('bukti-daftar.show', $peserta->id) }}" class="btn btn-primary">Cetak Bukti Daftar</a>
        </div>
    </div>
</div>
@endsection
