<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Http\Model\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $dataJadwals = Jadwal::orderBy('id', 'DESC')->get();

        return view('backend.jadwal.index', compact('dataJadwals'));
    }
}
