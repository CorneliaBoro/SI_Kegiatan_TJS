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
    public function kegiatan()
    {
        return $this->belongsTo(datakegiatan::class);
    }
   
}
