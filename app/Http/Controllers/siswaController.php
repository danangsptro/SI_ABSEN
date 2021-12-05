<?php

namespace App\Http\Controllers;

use App\Http\Model\Rombel;
use App\Http\Model\Siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('backend.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $rombel = Rombel::all();
        return view('backend.siswa.create', compact('rombel'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_lengkap' => 'required|min:1',
            'nisn' => 'required|min:1',
            'nik' => 'required|min:1',
            'tempat_lahir' => 'required|min:1',
            'rombel_id' => 'required|min:1',
            'status' => 'required|min:1',
            'jenis_kelamin' => 'required|min:1',
            'alamat' => 'required|min:1',
            'no_telepon' => 'required|min:1',
            'kebutuhan_khusus' =>  'required|min:1',
            'disibilitas' => 'required|min:3',
            'no_kip_pip' => 'required|min:1',
            'nama_ayah' => 'required|min:1',
            'nama_ibu' => 'required|min:1',
            'nama_wali' => 'required|min:1',
        ]);

        $siswa = Siswa::create($request->all());
        $siswa->nama_lengkap = $validate['nama_lengkap'];
        $siswa->nisn = $validate['nisn'];
        $siswa->nik = $validate['nik'];
        $siswa->tempat_lahir = $validate['tempat_lahir'];
        $siswa->rombel_id = $validate['rombel_id'];
        $siswa->status = $validate['status'];
        $siswa->jenis_kelamin = $validate['jenis_kelamin'];
        $siswa->alamat = $validate['alamat'];
        $siswa->no_telepon = $validate['no_telepon'];
        $siswa->kebutuhan_khusus = $validate['kebutuhan_khusus'];
        $siswa->disibilitas = $validate['disibilitas'];
        $siswa->no_kip_pip = $validate['no_kip_pip'];
        $siswa->nama_ayah = $validate['nama_ayah'];
        $siswa->nama_ibu = $validate['nama_ibu'];
        $siswa->nama_wali = $validate['nama_wali'];
        $siswa->save();

        if ($siswa) {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap berhasil ditambahkan",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap gagal ditambahkan",
                'style' => 'danger'
            ]);
        }

    }
}
