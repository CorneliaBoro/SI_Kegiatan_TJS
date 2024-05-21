@extends('layout.app')

@section('content')
<div class="container">
    <h1>Daftar Kegiatan</h1>
    @if ($kegiatan->isEmpty())
        <p>Tidak ada kegiatan yang tersedia.</p>
    @else
        <div class="list-group">
            @foreach ($kegiatan as $item)
                <div class="list-group-item">
                    <h5>{{ $item->nama }}</h5>
                    <p>Waktu: {{ $item->waktu }}</p>
                    <p>Tempat: {{ $item->tempat }}</p>
                    <a href="{{ route('User.create', $item->id) }}" class="btn btn-primary">Daftar</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
