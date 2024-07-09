<?php

namespace App\Exports;

use App\Models\Laporan;
use App\Models\datapegawai;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Ambil data laporan dan peserta dari data yang diberikan
        $laporan = $this->data['laporan'];
        $peserta = $this->data['peserta'];
           
        $collection = [];
    
        // Membuat collection berdasarkan data yang diberikan
        foreach ($peserta as $item) {
            $collection[] = [
                'Nama Kegiatan' => $laporan->kegiatan->nama,
                'Nama Penanggungjawab' => $laporan->kegiatan->pegawai->nama, 
                'Tanggal' => $laporan->kegiatan->waktu,
                'Dokumen Peserta' => $item->dokumen,
                // Tambahkan kolom lainnya sesuai kebutuhan
            ];
        }
    
        return collect($collection);
    }

    public function headings(): array
    {
        return [
            'Nama Kegiatan',
            'Nama Penanggungjawab',
            'Tanggal',
            'Dokumen Peserta',

            // Tambahkan heading lainnya sesuai kebutuhan
        ];
    }
}

