@extends('layout.app')

@section('content')
<div class="container">
    <h1>Daftar Kegiatan</h1>
    @if ($kegiatan->isEmpty())
        <p>Tidak ada kegiatan yang tersedia.</p>
    @else
        <div class="row">
            @foreach ($kegiatan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Waktu: {{ $item->waktu }}</p>
                            <p class="card-text">Tempat: {{ $item->tempat }}</p>
                            <p class="card-text">Deskripsi: {{ $item->deskripsi }}</p>
                            <p class="card-text">Kuota: {{ $item->current_participants }} / {{ $item->kuota }}</p>
                            @if($item->current_participants < $item->kuota)
                                <a href="{{ route('User.create', $item->id) }}" class="btn btn-primary">Daftar</a>
                            @else
                                <button type="button" class="btn btn-secondary" disabled>Kuota Penuh</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
