<?php

namespace App\Models;

use App\Models\datapegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $fillable = [
        'id_kegiatan', 'file_dokumentasi',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(datakegiatan::class, 'id_kegiatan');
    }

    public function pegawai()
    {
        return $this->belongsTo(datapegawai::class, 'id_pegawai'); // Sesuaikan dengan nama kolom yang sesuai dalam tabel laporan
    }
}
