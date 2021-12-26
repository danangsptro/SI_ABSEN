<?php

namespace App\Http\Controllers;

use App\Http\Model\dataAbsen;
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
        $dataAbsen = dataAbsen::all();
        $id = Auth::user()->id;
        $absen = dataAbsen::where('pelajaran_id', $id)->get();
        // dd($absen);
        return view('backend.absenSiswa.index', compact('dataAbsen', 'absen'));
    }

    public function create()
    {
        $siswa = Rombel::all();
        $mataPelajaran = mataPelajaran::all();
        $guru = User::where('user_role', 'guru')->get();
        return view('backend.absenSiswa.create', compact('siswa', 'mataPelajaran', 'guru'));
    }

    public function show ($id)
    {
        $siswa = Siswa::with('rombel')->get();
        $auth = Auth::user()->id;
        $mataPelajaran = Rombel::with('dataAbsen')->where('kelas_id', $auth)->get();
        dd($mataPelajaran);
        return view('backend.absenSiswa.show', compact('siswa', 'mataPelajaran'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas_id' => 'required|min:1',
            'pelajaran_id' => 'required|min:1',
            'guru_id' => 'required|min:1',
        ]);

        $result = dataAbsen::create($request->all());
        $result->kelas_id = $validate['kelas_id'];
        $result->pelajaran_id = $validate['pelajaran_id'];
        $result->guru_id = $validate['guru_id'];
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
