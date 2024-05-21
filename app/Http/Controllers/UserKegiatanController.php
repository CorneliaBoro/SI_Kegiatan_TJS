<?php

namespace App\Http\Controllers;

use App\Models\datakegiatan;
use Illuminate\Http\Request;

class UserKegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = datakegiatan::all();
        return view('User.index', compact('kegiatan'));
    }
}
