@extends('Admin.dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Kegiatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Daftar Kegiatan</li>
            </ol>
        </div>
    </div>
@endsection

@section('pesan')
@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('datakegiatan.create') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>

        </div>
    </div>
@endsection

@section('konten')
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Nama Kegiatan</th>
                    <th class="col-1">Waktu</th>
                    <th class="col-1">Tempat</th>
                    <th class="col-1">Deskripsi</th>
                    <th class="col-1">PJ</th>
                    <th class="col-1">Kuota</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td class="col-1">{{ $i }}</td>
                        <td class="col-2" >{{ $item->nama }}</td>
                        <td class="col-2">{{ $item->waktu }}</td>
                        <td class="col-1" >{{ $item->tempat }}</td>
                        <td class="col-2" >{{ $item->deskripsi }}</td>
                        <td class="col-2">{{ $item->pegawai->nama }}</td>
                        <td class="col-1">{{ $item->kuota}}</td>
                        <td class="col-3">{{ $item->status }}</td>
                        <td class="col-2">
                            <a href="{{ route('datakegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="{{ route('datakegiatan.destroy', $item->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>                            
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection