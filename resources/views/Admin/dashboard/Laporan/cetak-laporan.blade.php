<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Data Kegiatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
            padding-top: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #000;
            font-size: 14px;
        }
    </style>
</head>
<body>
    @php
    function tanggal_indonesia($tanggal) {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        $tahun = substr($tanggal, 0, 4);
        $bulan_angka = substr($tanggal, 5, 2);
        $tanggal_angka = substr($tanggal, 8, 2);

        return $tanggal_angka . ' ' . $bulan[$bulan_angka] . ' ' . $tahun;
    }

    function jam($waktu) {
        return substr($waktu, 11, 5);
    }

    function tanggal_cetak() {
        $hari = date('d');
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $bulan_angka = date('m');
        $tahun = date('Y');

        return $hari . ' ' . $bulan[$bulan_angka] . ' ' . $tahun;
    }

    function getMimeType($file) {
        $path = public_path('storage/dokumentas-laporan/' . $file);
        return mime_content_type($path);
    }
    @endphp

    <div class="container">
        <div class="header">
            <h1>Laporan Kegiatan</h1>
        </div>
        <div class="info">
            <p><strong>Nama Kegiatan:</strong> {{ $kegiatan->nama }}</p>
            <p><strong>Waktu Pelaksanaan:</strong> {{ tanggal_indonesia($kegiatan->waktu) }} {{ jam($kegiatan->waktu) }}</p>
            <p><strong>Penanggung Jawab:</strong> {{ $kegiatan->pegawai->nama }}</p>
        </div>
        <div class="table-container">
            <h2>Dokumentasi Kegiatan</h2>
            @foreach($base64_dokumentasi as $base64_image)
                <img src="{{ $base64_image }}" alt="Dokumentasi Kegiatan" style="max-width: 100px; max-height: 100px; margin: 5px;" />
            @endforeach
        </div>
        
        
        <div class="table-container">
            <h2>Daftar Peserta</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <img src="{{ $item->base64_dokumen }}" alt="KTP" style="max-width: 100px; max-height: 100px;">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Dicetak pada {{ tanggal_cetak() }}</p>
    </footer>
</body>
</html>
