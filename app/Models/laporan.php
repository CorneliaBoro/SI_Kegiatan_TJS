<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
