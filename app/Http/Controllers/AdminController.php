<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('Admin.dashboard.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
