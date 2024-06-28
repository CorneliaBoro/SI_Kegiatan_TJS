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
            <h3><?php echo e($kegiatan->nama); ?></h3>
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
            <p><strong>Waktu:</strong> <?php echo e($indonesianDay); ?>, <?php echo e(date('d/m/Y', strtotime($kegiatan->waktu))); ?> <?php echo e(date('H:i', strtotime($kegiatan->waktu))); ?></p>
            <p><strong>Tempat:</strong> <?php echo e($kegiatan->tempat); ?></p>
            <hr>
            <h3>Data Peserta</h3>
            <ul>
                <li><strong>Nama:</strong> <?php echo e($peserta->nama); ?></li>
                <li><strong>NIK:</strong> <?php echo e($peserta->nik); ?></li>
                <li><strong>Tanggal Lahir:</strong> <?php echo e(date('d/m/Y', strtotime($peserta->tgl_lahir))); ?></li>
                <li><strong>No Telp:</strong> <?php echo e($peserta->no_hp); ?></li>
                <li><strong>Alamat:</strong> <?php echo e($peserta->alamat); ?></li>
            </ul>
        </div>
        <div class="footer">
            <p>Waktu Cetak: <?php echo e(now()->format('d-m-Y')); ?></p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SI_Kegiatan_TJS\resources\views/User/buktidaftar.blade.php ENDPATH**/ ?>