<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\Peserta;
use App\Models\datapegawai;
use Illuminate\Support\Str;
use App\Models\datakegiatan;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::with('kegiatan')->get();

          return view('Admin.dashboard.Laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatans = datakegiatan::pluck('nama', 'id');

        return view('Admin.dashboard.Laporan.create', compact('kegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kegiatan' => 'required',
            'file_dokumentasi.*' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $filePaths = [];
        if ($request->hasFile('file_dokumentasi')) {
            foreach ($request->file('file_dokumentasi') as $dokumentasi) {
                $filename = date('Y-m-d') . '-' . uniqid() . '-' . $dokumentasi->getClientOriginalName();
                $path = 'dokumentas-laporan/' . $filename;
    
                Storage::disk('public')->put($path, file_get_contents($dokumentasi));
    
                // Simpan setiap file path
                $filePaths[] = $filename;
            }
        }
    
        // Konversi array file path menjadi string JSON untuk penyimpanan
        $filePathsJson = json_encode($filePaths);
    
        // Buat laporan baru
        $laporan = Laporan::create([
            'id_kegiatan' => $request->id_kegiatan,
            'file_dokumentasi' => $filePathsJson,
        ]);
    
        $request->session()->put('laporan', $laporan);
    
        // Redirect ke halaman detail laporan
        return redirect()->route('laporan.index', ['laporan' => $laporan->id])
                         ->with('success', 'Laporan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $kegiatan = DataKegiatan::pluck('nama', 'id');

        return view('Admin.dashboard.Laporan.edit', compact('laporan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kegiatan' => 'required',
            'file_dokumentasi.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        // Ambil data laporan yang akan diupdate
        $laporan = Laporan::findOrFail($id);
    
        // Handle file dokumentasi yang diupload
        if ($request->hasFile('file_dokumentasi')) {
            $filePaths = [];
            foreach ($request->file('file_dokumentasi') as $dokumentasi) {
                $filename = date('Y-m-d') . '-' . uniqid() . '-' . $dokumentasi->getClientOriginalName();
                $path = 'dokumentas-laporan/' . $filename;
    
                Storage::disk('public')->put($path, file_get_contents($dokumentasi));
    
                // Simpan setiap file path
                $filePaths[] = $filename;
            }
    
            // Konversi array file path menjadi string JSON untuk penyimpanan
            $laporan->file_dokumentasi = json_encode($filePaths);
        }
    
        // Update id_kegiatan jika ada perubahan
        $laporan->id_kegiatan = $request->id_kegiatan;
    
        // Simpan perubahan laporan
        $laporan->save();
    
        return redirect()->route('laporan.index')
                         ->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);

    // Hapus laporan yang ditemukan
    $laporan->delete();

    // Redirect kembali ke halaman index laporan dengan pesan sukses
    return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
   
    }

    public function print($id_kegiatan)
{
    $kegiatan = DataKegiatan::findOrFail($id_kegiatan);
$laporan = Laporan::where('id_kegiatan', $id_kegiatan)->firstOrFail();
$peserta = Peserta::where('id_kegiatan', $id_kegiatan)->get();
$pegawai = DataPegawai::all(); // Sesuaikan dengan model pegawai Anda

// Base64 encode untuk file dokumentasi utama
$file_dokumentasi_path = 'dokumentas-laporan/' . $laporan->file_dokumentasi;
$file_dokumentasi = Storage::disk('public')->get($file_dokumentasi_path);
$base64_dokumentasi = base64_encode($file_dokumentasi);
// Ubah format dokumen dalam peserta menjadi array base64
foreach ($peserta as $item) {
    $dokumen_path = 'dokumen-ktp/' . $item->dokumen;
    $item->base64_dokumen = base64_encode(Storage::disk('public')->get($dokumen_path));
}

// Data untuk dikirimkan ke view
$data = [
    'kegiatan' => $kegiatan,
    'laporan' => $laporan,
    'peserta' => $peserta,
    'pegawai' => $pegawai,
    'base64_dokumentasi' => $base64_dokumentasi,
];


// Load view dan buat PDF
$pdf = PDF::loadView('Admin.dashboard.Laporan.cetak-laporan', $data);

// Download PDF dengan nama file sesuai nama kegiatan
return $pdf->download('LaporanKegiatan_' . $kegiatan->nama . '.pdf');
}






}
