<?php

namespace App\Http\Controllers;

use App\Http\Model\dataAbsen;
use App\Http\Model\Jadwal;
use App\Http\Model\mataPelajaran;
use App\Http\Model\Rombel;
use App\Http\Model\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class absenController extends Controller
{
    public function index()
    {
        $dataPelajarans = Jadwal::where('guru_id', Auth::user()->id)->get();
        return view('backend.absenSiswa.index', compact('dataPelajarans'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mataPelajaran = mataPelajaran::all();
        $guru = User::where('user_role', 'guru')->get();
        return view('backend.absenSiswa.create', compact('siswa', 'mataPelajaran', 'guru'));
    }

    public function show($id)
    {
        $siswa = Siswa::with('rombel')->get();
        $auth = Auth::user()->id;
        $mataPelajaran = Rombel::with('dataAbsen')->where('kelas_id', $auth)->get();
        return view('backend.absenSiswa.show', compact('siswa', 'mataPelajaran'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas_id' => 'required|min:1',
            'pelajaran_id' => 'required|min:1',
            'guru_id' => 'required|min:1',
            'alfa' => 'required|min:1',
            'izin' => 'required|min:1',
            'sakit' => 'required|min:1',
            'terlambat' => 'required|min:1',
            'tanggal_absen' => 'required|min:1',
        ]);

        $result = dataAbsen::create($request->all());
        $result->kelas_id = $validate['kelas_id'];
        $result->pelajaran_id = $validate['pelajaran_id'];
        $result->guru_id = $validate['guru_id'];
        $result->alfa = $validate['alfa'];
        $result->izin = $validate['izin'];
        $result->sakit = $validate['sakit'];
        $result->terlambat = $validate['terlambat'];
        $result->tanggal_absen = $validate['tanggal_absen'];
        $result->save();

        if ($result) {
            return redirect('backend/absen-siswa')->with([
                'message' => "Data $result->kelas_id berhasil ditambahkan",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/absen-siswa')->with([
                'message' => "Data $result->kelas_id gagal ditambahkan",
                'style' => 'danger'
            ]);
        }
    }

    public function edit($id)
    {
        $dataAbsen = dataAbsen::find($id);
        $siswa = Siswa::all();
        $mataPelajaran = mataPelajaran::all();
        return view('backend.absenSiswa.edit', compact('dataAbsen', 'siswa', 'mataPelajaran'));
    }


    public function delete($id)
    {
        $data = dataAbsen::find($id);
        $data->delete();

        if ($data) {
            return redirect('backend/absen-siswa')->with([
                'message' => "Data $data->kelas_id berhasil dihapus",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/absen-siswa')->with([
                'message' => "Data $data->kelas_id gagal dihapus",
                'style' => 'danger'
            ]);
        }
    }
}
