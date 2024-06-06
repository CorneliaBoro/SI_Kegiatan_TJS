<?php

namespace App\Models;

use App\Models\Peserta;
use App\Models\datapegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datakegiatan extends Model
{
    use HasFactory;
    protected $table = "datakegiatan";
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(datapegawai::class,'id_pegawai', 'id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    public function laporan()
    {
        return $this->hasMany(laporan::class);
    }
}
