<?php

namespace App\Http\Controllers;

use App\Http\Model\dataAbsen;
use App\Http\Model\mataPelajaran;
use App\Http\Model\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporanController extends Controller
{
    public function index()
    {
        $kelas = Rombel::all();
        return view('backend.laporan.index', compact('kelas'));
    }

    public function show ()
    {
        $mataPelajaran = mataPelajaran::with('dataAbsen')->get();
        return view('backend.laporan.show', compact('mataPelajaran'));
    }

    public function detailLaporan ($id)
    {
       $mataPelajaran = mataPelajaran::addSelect(['id', 'nama_pelajaran'])->find($id);
        dd($mataPelajaran);

        return view('backend.laporan.detailLaporan', compact('mataPelajaran'));
    }
}
