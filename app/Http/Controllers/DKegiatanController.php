<?php

namespace App\Http\Controllers;

use App\Models\datapegawai;
use App\Models\datakegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = datapegawai::all(); 
        $data = datakegiatan::with('pegawai')->get();
        return view('Admin.dashboard.DataKegiatan.index', compact('data','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = datapegawai::all(); 
        return view('Admin.dashboard.DataKegiatan.create', ['pegawai' => $pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
            'kuota'=>'required',
            'status' => 'required',
            'id_pegawai' => 'required',
        ], [
            'nama.required' => 'Nama Wajib diisi!',
            'waktu.required' => 'Waktu Wajib diisi!',
            'tempat.required' => 'Tempat Wajib diisi!',
            'deskripsi.required' => 'Deskripsi Wajib diisi!',
            'kuota.required' => 'Kuota Wajib diisi!',
            'status.required' => 'Status Wajib diisi!',
            'id_pegawai.required' => 'Pilih Pegawai Wajib diisi!',
        ]);
    
        $data = [
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'kuota' => $request->kuota,
            'status' => $request->status,
            'id_pegawai' => $request->id_pegawai,
        ];
        $pegawai = datapegawai::all();
        datakegiatan::create($data);
        return redirect()->route('datakegiatan.index', 
        compact('pegawai'))->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = datakegiatan::findOrFail($id); // Ambil data kegiatan berdasarkan id
        $pegawai = datapegawai::all(); // Ambil semua data pegawai
    
        return view('Admin.dashboard.DataKegiatan.edit', compact('data', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
            'kuota' => 'required',
            'status' => 'required',
            'id_pegawai' => 'required',
        ], [
            'nama.required' => 'Nama Wajib diisi!',
            'waktu.required' => 'Waktu Wajib diisi!',
            'tempat.required' => 'Tempat Wajib diisi!',
            'deskripsi.required' => 'Deskripsi Wajib diisi!',
            'kuota.required' => 'Kuota Wajib diisi!',
            'status.required' => 'Status Wajib diisi!',
            'id_pegawai.required' => 'Pilih Pegawai Wajib diisi!',
        ]);
    
        $data = [
            'nama' => $request->nama,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
            'kuota' => $request->kuota,
            'status' => $request->status,
            'id_pegawai' => $request->id_pegawai,
        ];
    
        datakegiatan::where('id', $id)->update($data); // Perbarui data pada tabel DataKegiatan
    
        return redirect()->route('datakegiatan.index')->with('success', 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        datakegiatan::where('id',$id)->delete();
        return redirect()->route('datakegiatan.index')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
