<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\User;
use App\Http\Model\Jadwal;
use App\Http\Model\mataPelajaran;

class JadwalController extends Controller
{
    public function index()
    {
        $dataJadwals = Jadwal::orderBy('id', 'DESC')->get();

        return view('backend.jadwal.index', compact('dataJadwals'));
    }

    public function create()
    {
        $gurus  = User::where('user_role', 'guru')->get();
        $mapels = mataPelajaran::all();
        $haris  = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];

        return view('backend.jadwal.form', compact(
            'gurus',
            'mapels',
            'haris'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'pelajaran_id' => 'required',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ]);

        $datas = [
            'guru_id' => $request->guru_id,
            'pelajaran_id' => $request->pelajaran_id,
            'hari' => $request->hari,
            'waktu' => $request->waktu_mulai . '-' . $request->waktu_selesai
        ];

        Jadwal::create($datas);

        return redirect('backend/jadwal')->with([
            'message' => "Menambahkan Jadwal",
            'style'   => 'success'
        ]);
    }

    public function edit($id)
    {
        // 
    }

    public function update(Request $request)
    {
        // 
    }

    public function siswa($id)
    {
        $jadwal = Jadwal::find($id);

        return view('backend.jadwal.siswa', compact('jadwal'));
    }

    public function getSiswa()
    {
        // 
    }
}
