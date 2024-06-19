<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Data Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
            padding-top: 100px; /* Margin tambahan untuk menjaga jarak antara header dan tabel */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 1px;
            text-align: left;
            min-width: 100px;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px; /* Atur lebar maksimum gambar */
            max-height: 100px; /* Atur tinggi maksimum gambar */
        }
        @page {
            size: landscape;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 30px;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            line-height: 30px;
            background-color: #f2f2f2;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <header>Daftar Peserta Kegiatan   {{ $kegiatan->nama }}</header>
    <footer>Tanggal Cetak: {{ now()->format('d-m-Y') }}</footer>
    <div class="container">
        @if (count($peserta) > 0)
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
                        <th>Tanggal Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $index => $pesertas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pesertas->nama }}</td>
                            <td>{{ $pesertas->nik }}</td>
                            <td>{{ $pesertas->tgl_lahir }}</td>
                            <td>{{ $pesertas->no_hp }}</td>
                            <td>{{ $pesertas->alamat }}</td>
                            <td>
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/dokumen-ktp/' . $pesertas->dokumen))) }}" alt="KTP">
                            </td>
                            <td>{{ $pesertas->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data peserta yang tersedia untuk kegiatan ini.</p>
        @endif
    </div>
</body>
</html>
