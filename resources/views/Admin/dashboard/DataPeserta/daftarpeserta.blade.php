<!-- resources/views/daftar_peserta/index.blade.php -->
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Daftar Peserta</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Dokumen</th>
                <th>Tanggal Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1; ?>
            @foreach ($peserta as $pesertas)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $pesertas->nama }}</td>
                <td>{{ $pesertas->nik }}</td>
                <td>{{ $pesertas->tgl_lahir }}</td>
                <td>{{ $pesertas->no_hp }}</td>
                <td>{{ $pesertas->alamat }}</td>
                <td>
                    @if(Storage::exists('storage/app/dokumen_peserta/' . $pesertas->dokumen))
                        <a href="{{ asset('storage/app/dokumen_peserta/' . $pesertas->dokumen) }}" target="_blank">Lihat Dokumen</a>
                    @else
                        Dokumen tidak ditemukan
                    @endif
                </td>
                <td>{{ $pesertas->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
