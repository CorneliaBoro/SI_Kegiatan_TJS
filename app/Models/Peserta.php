<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = "peserta";
    protected $fillable = [
        'nama',
        'nik',
        'tgl_lahir',
        'no_hp',
        'alamat',
        'dokumen',
        'id_kegiatan'
    ];

    public static $rules = [
        'nama' => 'required|string|max:255',
        'nik' => 'required|string|size:16', 
        'tgl_lahir' => 'required|date',
        'no_hp' => 'required|string|max:15',
        'alamat' => 'required|string',
        'dokumen' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        'validasi' => 'required',
    ];
    public function kegiatan()
    {
        return $this->belongsTo(datakegiatan::class);
    }
   
}
