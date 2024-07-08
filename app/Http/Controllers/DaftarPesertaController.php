<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Peserta;
use App\Models\datakegiatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class DaftarPesertaController extends Controller
{
    public function index($id_kegiatan)
    {
    
        $kegiatan = DataKegiatan::findOrFail($id_kegiatan);
        $peserta = Peserta::where('id_kegiatan', $id_kegiatan)->get();

        $data = [
            'peserta' => $peserta,
            'kegiatan' => $kegiatan,
        ];

        // Load view dari PDF
        $pdf = PDF::loadView('Admin.dashboard.DataPeserta.cetak-peserta', $data);

        // // Atur opsi DOMPDF untuk menangani gambar
        // $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);

        // Kembalikan PDF sebagai response
        return $pdf->download('DaftarPeserta_' . $kegiatan->nama . '.pdf');
    }

    public function show()
    {
        $kegiatan = datakegiatan::all();
        $peserta = Peserta::all();

        return view('Admin.dashboard.DataPeserta.index', compact('kegiatan', 'peserta'));
    }

    public function kelolapeserta($id_kegiatan)
    {
        $kegiatan = DataKegiatan::findOrFail($id_kegiatan);
        $peserta = Peserta::where('id_kegiatan', $id_kegiatan)->get();

        $data = [
            'peserta' => $peserta,
            'kegiatan' => $kegiatan,
        ];

        return view('Admin.dashboard.DataPeserta.daftarpeserta', compact('kegiatan', 'peserta'));
    }

}
