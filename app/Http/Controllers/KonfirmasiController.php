<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        return view('dosen.konfirmasi');
    }

    public function getDataSidang()
    {
    }
}
