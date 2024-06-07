<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\datakegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function create($kegiatanId)
    {
        $kegiatan = datakegiatan::findOrFail($kegiatanId);
        return view('user.pendaftaran', compact('kegiatan'));
    }

    public function store(Request $request, $kegiatanId)
    {
        $kegiatan = datakegiatan::findOrFail($kegiatanId);

        if ($kegiatan->current_participants >= $kegiatan->kuota) {
            return redirect()->back()->with('error', 'Kuota sudah penuh.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:peserta,nik,NULL,id,id_kegiatan,'.$kegiatanId,
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'dokumen' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'validasi' => 'required',
        ], [
            'nik.unique' => 'NIK sudah digunakan pada kegiatan ini.'
        ]);

        if (Peserta::where('nik', $request->nik)->exists()) {
            return redirect()->back()->with('error', 'NIK sudah Terdaftar');
        }

        $dokumenPath = $request->file('dokumen')->storeAs('dokumen_peserta', 
            Str::random(20) . '.' . $request->file('dokumen')->extension());

            $peserta = Peserta::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tgl_lahir' => $request->tgl_lahir,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'dokumen' => $dokumenPath,
                'id_kegiatan' => $kegiatanId,
            ]);

        // Increment current_participants
        $kegiatan->increment('current_participants');
        $request->session()->put('peserta', $peserta);
        return redirect()->route('sukses', ['peserta' => $peserta])->with('success', 'Pendaftaran berhasil.');
    }

    public function showSuccess()
    {
    return view('User.sukses');
    }
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
    $kegiatan = datakegiatan::findOrFail($peserta->id_kegiatan);

    return view('User.buktidaftar', compact('peserta', 'kegiatan'));

    }

    public function cetak()
    {
        // Contoh menggunakan laravel-dompdf untuk generate PDF
        $data = ['title' => 'Bukti Pendaftaran'];
        // $pdf = PDF::loadView('cetak_bukti', $data);

        // return $pdf->download('bukti_pendaftaran.pdf');
    }

    public function viewDokumen($filename)
    {
        $file = storage_path('app/dokumen_peserta/'.$filename);
        return response()->file($file);
    }
}
