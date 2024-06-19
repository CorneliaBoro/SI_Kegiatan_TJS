<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Support\Str;
use App\Models\datakegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $nik = $request->nik;
        if (Peserta::where('nik', $nik)->exists()) {
            return redirect()->back()->with('error', "NIK '$nik' sudah Terdaftar");
        }
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:peserta,nik,NULL,id,id_kegiatan,'.$kegiatanId,
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'dokumen' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'validasi' => 'required',
        ], [
            'nik.unique' => 'NIK sudah digunakan pada kegiatan ini.'
        ]);

       
        

        $dokumen     = $request->file('dokumen');
        $filename   = date('Y-m-d') . $dokumen->getClientOriginalName();
        $path       = 'dokumen-ktp/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($dokumen));

        // $dokumenPath = $request->file('dokumen')->storeAs('dokumen_peserta', 
        //     Str::random(20) . '.' . $request->file('dokumen')->extension());

            $peserta = Peserta::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tgl_lahir' => $request->tgl_lahir,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'dokumen' => $filename,
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

    $data = [
        'peserta' => $peserta,
        'kegiatan' => $kegiatan,
    ];
    $nama_potongan = explode(' ', $peserta->nama);

    // Menggunakan potongan pertama (nama depan) sebagai nama file PDF
    $nama_file = 'BuktiPendaftaran_' . $nama_potongan[0] . '.pdf';

    // Membuat data yang akan dilewatkan ke view
    $data = [
        'peserta' => $peserta,
        'kegiatan' => $kegiatan,
    ];

    // Load view dari PDF
    $pdf = PDF::loadView('User.buktidaftar', $data);

    // Menggunakan metode download untuk mengunduh PDF dengan nama file yang sudah dibuat
    return $pdf->download($nama_file);

    }
}
