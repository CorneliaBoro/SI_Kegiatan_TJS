<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pendaftaran</title>
    <style>
        body {
            font-family: 'Popin', sans-serif; /* Menggunakan font Popin */
            font-size: 16px;
            color: #000;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            border: 1px solid #ddd;
            padding: 20px;
        }
        .content h3, .content h4, .content p, .content ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
    <!-- Memuat font Popin dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Popin:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bukti Pendaftaran</h1>
        </div>
        <div class="content">
            <h3>{{ $kegiatan->nama }}</h3>
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
            <p><strong>Waktu:</strong> {{ $indonesianDay }}, {{ date('d/m/Y', strtotime($kegiatan->waktu)) }} {{ date('H:i', strtotime($kegiatan->waktu)) }}</p>
            <p><strong>Tempat:</strong> {{ $kegiatan->tempat }}</p>
            <hr>
            <h3>Data Peserta</h3>
            <ul>
                <li><strong>Nama:</strong> {{ $peserta->nama }}</li>
                <li><strong>NIK:</strong> {{ $peserta->nik }}</li>
                <li><strong>Tanggal Lahir:</strong> {{ date('d/m/Y', strtotime($peserta->tgl_lahir)) }}</li>
                <li><strong>No Telp:</strong> {{ $peserta->no_hp }}</li>
                <li><strong>Alamat:</strong> {{ $peserta->alamat }}</li>
            </ul>
        </div>
        <div class="footer">
            <p>Waktu Cetak: {{ now()->format('d-m-Y') }}</p>
        </div>
    </div>
</body>
</html>
