@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Bukti Pendaftaran
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $kegiatan->nama }}</h4>
            {{-- Ubah format tanggal dan hari dalam bahasa Indonesia --}}
            <?php
                $days = [
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                ];
                $months = [
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                ];
                $dayOfWeek = date('l', strtotime($kegiatan->waktu));
                $indonesianDay = $days[$dayOfWeek];
                $month = date('F', strtotime($kegiatan->waktu));
                $indonesianMonth = $months[$month];
            ?>
            <p class="card-text waktu"><strong>Waktu:</strong> {{ $indonesianDay }}, {{ date('d/m/Y', strtotime($kegiatan->waktu)) }} {{ date('H:i', strtotime($kegiatan->waktu)) }}</p>
            <p class="card-text tempat"><strong>Tempat:</strong> {{ $kegiatan->tempat }}</p>
            <hr>
            <h5 class="card-title">Data Peserta</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ $peserta->nama }}</li>
                <li class="list-group-item"><strong>NIK:</strong> {{ $peserta->nik }}</li>
                {{-- Tampilkan tanggal lahir dalam format dd/mm/yyyy --}}
                <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ date('d/m/Y', strtotime($peserta->tgl_lahir)) }}</li>
                <li class="list-group-item"><strong>No Telp:</strong> {{ $peserta->no_hp }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $peserta->alamat }}</li>
            </ul>
        </div>
        <div class="card-footer bg-transparent border-top-0">
            {{-- Tambahkan hanya tanggal di footer --}}
            <span class="text-muted float-right">Waktu Cetak: {{ now()->format('d-m-Y') }}</span>
        </div>
    </div>
</div>
@endsection
