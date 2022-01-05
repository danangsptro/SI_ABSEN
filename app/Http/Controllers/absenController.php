<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\User;
use App\Http\Model\Siswa;
use App\Http\Model\Jadwal;
use App\Http\Model\Rombel;
use App\Http\Model\dataAbsen;
use App\Http\Model\mataPelajaran;

class absenController extends Controller
{
    public function index()
    {
        $time   = Carbon::now();
        $getDay = $time->isoFormat('dddd');

        $dataPelajarans = Jadwal::where('guru_id', Auth::user()->id)->get();

        return view('backend.absenSiswa.index', compact(
            'dataPelajarans',
            'getDay'
        ));
    }


    public function show($id)
    {
        $siswa = Siswa::with('rombel')->get();
        $auth = Auth::user()->id;
        $mataPelajaran = Rombel::with('dataAbsen')->where('kelas_id', $auth)->get();

        return view('backend.absenSiswa.show', compact('siswa', 'mataPelajaran'));
    }
}
