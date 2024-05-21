<?php

namespace App\Models;

use App\Models\datakegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datapegawai extends Model
{
    use HasFactory;
    protected $table = "datapegawai";
    protected $fillable = ['nama','nip','email','no_hp'];

    public function datakegiatan()
    {
        return $this->hasMany(datakegiatan::class);
    }
}
