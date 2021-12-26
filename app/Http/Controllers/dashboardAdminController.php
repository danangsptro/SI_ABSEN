<?php

namespace App\Http\Controllers;

use App\Http\Model\dataAbsen;
use App\Http\Model\mataPelajaran;
use App\Http\Model\Rombel;
use App\Http\Model\Siswa;
use Illuminate\Http\Request;

class dashboardAdminController extends Controller
{
    public function index ()
    {
        $mapel = mataPelajaran::all();
        $siswa = Siswa::all();
        $absen = dataAbsen::all();
        $kelas = Rombel::all();
        return view('backend.dashboardAdmin', compact('mapel','siswa','absen','kelas'));
    }
}
