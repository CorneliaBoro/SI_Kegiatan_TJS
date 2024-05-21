<?php

namespace App\Http\Controllers;

use App\Models\datapegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = datapegawai ::orderBy('nama','asc')->get();
        return view('Admin.dashboard.DataPegawai.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.dashboard.DataPegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nip', $request->nip);
        Session::flash('email', $request->email);
        Session::flash('no_hp', $request->no_hp);

        $request->validate([
            'nama'=>'required',
            'nip'=>'required|unique:datapegawai',
            'email'=>'required',
            'no_hp'=>'required',
        ],[
            'nama.required'=>'Nama Wajib diisi!',
            'nip.required'=>'NIP Wajib diisi!',
            'email.required'=>'Email Wajib diisi!',
            'no_hp.required'=>'No HP Wajib diisi!',
        ]);

        $data=[
            'nama'=>$request->nama,
            'nip'=>$request->nip,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
        ];
        datapegawai::create($data);

        return redirect()->route('datapegawai.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = datapegawai::where('id',$id)->first();
        return view('Admin.dashboard.DataPegawai.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'nip'=>'required',
            'email'=>'required',
            'no_hp'=>'required',
        ],[
            'nama.required'=>'Nama Wajib diisi!',
            'nip.required'=>'NIP Wajib diisi!',
            'email.required'=>'Email Wajib diisi!',
            'no_hp.required'=>'no_hp Wajib diisi!',
        ]);

        $data=[
            'nama'=>$request->nama,
            'nip'=>$request->nip,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
        ];
        datapegawai::where('id',$id)->update($data);

        return redirect()->route('datapegawai.index')->with('success', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        datapegawai::where('id',$id)->delete();
        return redirect()->route('datapegawai.index')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
