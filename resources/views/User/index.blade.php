@extends('layout.app')
@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@section('content')
<div class="container center-screen">
    <header class="header">
        <h1>Pendaftaran Kegiatan Kelurahan Tunjungsekar</h1>
    </header>
    @if ($kegiatan->isEmpty())
        <p>Tidak ada kegiatan yang tersedia.</p>
    @else
        <div class="row">
            @foreach ($kegiatan as $item)
                @php
                    $hari = Carbon::parse($item->waktu)->translatedFormat('l, j F Y');
                    $jam = Carbon::parse($item->waktu)->format('H:i');
                @endphp
                <div class="col-md-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <hr>
                            <p class="card-text">Hari: {{ $hari }}</p>
                            <p class="card-text">Jam: {{ $jam }}</p>
                            <p class="card-text">Tempat: {{ $item->tempat }}</p>
                            <p class="card-text">Deskripsi: {{ $item->deskripsi }}</p>
                            <p class="card-text">Kuota: {{ $item->current_participants }} / {{ $item->kuota }}</p>
                        </div>
                        <div class="card-footer">
                            @if($item->current_participants < $item->kuota)
                                <a href="{{ route('User.create', $item->id) }}" class="btn btn-primary btn-daftar">Daftar</a>
                            @else
                                <button type="button" class="btn btn-secondary btn-daftar" disabled>Kuota Penuh</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
