<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Support\Str;
use App\Models\datakegiatan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.dashboard.Laporan.index');
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
            'file_dokumentasi' => 'required|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
        ]);
    
        // Simpan file dokumentasi
        $filePath = $request->file('file_dokumentasi')->storeAs('dokumentasi', 
            Str::random(20) . '.' . $request->file('file_dokumentasi')->extension());

        // Buat laporan baru
        laporan::create([
            'id_kegiatan' => $request->id_kegiatan,
            'file_dokumentasi' => $filePath,
        ]);
    
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil disimpan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
