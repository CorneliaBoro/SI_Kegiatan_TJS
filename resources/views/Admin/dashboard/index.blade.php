@extends('Admin.dashboard.layout.dash-layout')
@section('title', 'Beranda')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-6">
            <h1>Beranda</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Menu Utama</li>
                <li class="breadcrumb-item active ">Beranda</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <h5>Aplikasi Pendaftaran Kegiatan</h5>
            </div>
        </div>
    </div>
@endsection

@section('konten')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid mt-2 px-3">

        </div><!-- /.container-fluid -->
        @if ($message = Session::get('success'))
            <div class="container-fluid px-3">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">SUKSES</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong> {{ $message }} </strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Data Kegiatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="dashboard/datakegiatan" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Data Peserta</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="dashboard/datapeserta" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Jadwal Kegiatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="dashboard/jadwalkegiatan" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
