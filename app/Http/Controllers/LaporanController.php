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
            'file_dokumentasi' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $dokumentasi     = $request->file('file_dokumentasi');
        $filename   = date('Y-m-d') . $dokumentasi->getClientOriginalName();
        $path       = 'dokumentas-laporan/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($dokumentasi));

        // Buat laporan baru
        $laporan = laporan::create([
            'id_kegiatan' => $request->id_kegiatan,
            'file_dokumentasi' => $filename,
        ]);
    
        $request->session()->put('laporan', $laporan);
        return redirect()->route('laporan.index',['laporan'=>$laporan])->with('success', 'Laporan berhasil disimpan.');
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
            'file_dokumentasi' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        $laporan = Laporan::findOrFail($id);

        if ($request->hasFile('file_dokumentasi')) {
            $dokumentasi = $request->file('file_dokumentasi');
            $filename = date('Y-m-d') . $dokumentasi->getClientOriginalName();
            $path = 'dokumentas-laporan/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($dokumentasi));
            $laporan->file_dokumentasi = $filename;
        }

        $laporan->id_kegiatan = $request->id_kegiatan;
        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');

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
    $peserta = Peserta::where('id_kegiatan', $id_kegiatan)->get();
    $laporan = Laporan::where('id_kegiatan', $id_kegiatan)->firstOrFail();
    $pegawai = datapegawai::all(); 

    $file_dokumentasi = Storage::disk('public')->get('dokumentas-laporan/' . $laporan->file_dokumentasi);
    $base64_dokumentasi = base64_encode($file_dokumentasi);
    $data = [
        'peserta' => $peserta,
        'kegiatan' => $kegiatan,
        'laporan' => $laporan,
        'pegawai'=>$pegawai,
        'base64_dokumentasi' => $base64_dokumentasi, 
    ];
    // Tambahkan file dokumentasi sebagai variabel ke view
    $data['base64_dokumentasi'] = $base64_dokumentasi;
    $pdf = PDF::loadView('Admin.dashboard.Laporan.cetak-laporan', $data);
    return $pdf->download('LaporanKegiatan' . $kegiatan->nama . '.pdf');
}
}
