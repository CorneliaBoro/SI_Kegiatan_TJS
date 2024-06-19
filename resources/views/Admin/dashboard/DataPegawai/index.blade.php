@extends('Admin.dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Daftar Pegawai</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('datapegawai.create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                    <th class="col-3">Nama</th>
                    <th class="col-2">NIP</th>
                    <th class="col-2">Email</th>
                    <th class="col-2">No HP</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td class="col-1">{{ $i }}</td>
                        <td class="col-2">{{ $item->nama }}</td>
                        <td class="col-2">{{ $item->nip }}</td>
                        <td class="col-2">{{ $item->email }}</td>
                        <td class="col-2">{{ $item->no_hp }}</td>
                        <td class="col-2">
                            <a href="{{ route('datapegawai.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action="{{ route('datapegawai.destroy', $item->id) }}" class="d-inline" method="post">
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