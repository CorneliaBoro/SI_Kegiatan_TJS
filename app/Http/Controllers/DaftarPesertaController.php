<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\datakegiatan;
use Illuminate\Http\Request;

class DaftarPesertaController extends Controller
{
    public function index($id)
    {
        $kegiatan = datakegiatan::findOrFail($id);
        $peserta = Peserta::where('id_kegiatan', $id)->get();

        return view('Admin.dashboard.DataPeserta.daftarpeserta', compact('kegiatan', 'peserta'));
    }

}
