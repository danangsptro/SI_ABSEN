<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\User;
use App\Http\Model\Siswa;
use App\Http\Model\Jadwal;
use App\Http\Model\JadwalSiswa;
use App\Http\Model\mataPelajaran;
use App\Http\Model\Rombel;

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

    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        $daftarSiswas = JadwalSiswa::where('jadwal_id', $id)->get();

        $siswas = Siswa::all();
        $kelas  = Rombel::all();

        return view('backend.jadwal.siswa', compact(
            'jadwal',
            'daftarSiswas',
            'siswas',
            'kelas'
        ));
    }

    public function api(Request $request)
    {
        $kelas_id = $request->kelas_id;
        $jadwal_id = $request->jadwal_id;

        $datas = Siswa::where('kelas_id', $kelas_id)->orderBy('id', 'DESC')->get();

        return Datatables::of($datas)
            ->editColumn('kelas', function ($d) {
                return $d->rombel->kelas;
            })
            ->addColumn('status', function ($d) use ($jadwal_id) {
                $check = JadwalSiswa::where('jadwal_id', $jadwal_id)->where('siswa_id', $d->id)->count();
                if ($check == 0) {
                    return 'Belum Ditambahkan';
                } else {
                    return 'Sudah Ditambahkan';
                }
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function exportSiswa(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $kelas_id  = $request->kelas_id;

        $siswas = Siswa::where('kelas_id', $kelas_id)->get();

        $jadwal_siswa = 0;
        foreach ($siswas as $i) {
            $check = JadwalSiswa::where('jadwal_id', $jadwal_id)->where('siswa_id', $i->id)->count();

            if ($check == 0) {
                $jadwal_siswa = new JadwalSiswa();
                $jadwal_siswa->jadwal_id = $jadwal_id;
                $jadwal_siswa->siswa_id = $i->id;
                $jadwal_siswa->save();
            }
        }

        return redirect()
            ->route('jadwal.show', $jadwal_id)
            ->with([
                'message' => "Berhasil menambahkan siswa",
                'style'   => 'success'
            ]);
    }

    public function deleteSiswa($id)
    {
        $data = JadwalSiswa::find($id);
        $data->delete();

        return redirect()
            ->route('jadwal.show', $data->jadwal_id)
            ->with([
                'message' => "Siswa Berhasil dihapus",
                'style'   => 'success'
            ]);
    }
}
