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
            'tanggal_lahir' => 'required|min:1',
            'kelas_id' => 'required|min:1',
            'status' => 'required|min:1',
            'jenis_kelamin' => 'required|min:1',
            'alamat' => 'required|min:1',
            'no_telepon' => 'required|min:1',
            'kebutuhan_khusus' =>  'required|min:1',
            'disibilitas' => 'required|min:3',
            'nama_ayah' => 'required|min:1',
            'nama_ibu' => 'required|min:1',
            'nama_wali' => 'required|min:1',
        ]);

        $siswa = Siswa::create($request->all());
        $siswa->nama_lengkap = $validate['nama_lengkap'];
        $siswa->nisn = $validate['nisn'];
        $siswa->nik = $validate['nik'];
        $siswa->tempat_lahir = $validate['tempat_lahir'];
        $siswa->tanggal_lahir = $validate['tanggal_lahir'];
        $siswa->kelas_id = $validate['kelas_id'];
        $siswa->status = $validate['status'];
        $siswa->jenis_kelamin = $validate['jenis_kelamin'];
        $siswa->alamat = $validate['alamat'];
        $siswa->no_telepon = $validate['no_telepon'];
        $siswa->kebutuhan_khusus = $validate['kebutuhan_khusus'];
        $siswa->disibilitas = $validate['disibilitas'];
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

    public function edit ($id)
    {
        $siswa = Siswa::find($id);
        $rombel = Rombel::all();
        return view('backend.siswa.edit', compact('siswa', 'rombel'));
    }

    public function update (Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|min:1',
            'nisn' => 'required|min:1',
            'nik' => 'required|min:1',
            'tempat_lahir' => 'required|min:1',
            'tanggal_lahir' => 'required|min:1',
            'kelas_id' => 'required|min:1',
            'status' => 'required|min:1',
            'jenis_kelamin' => 'required|min:1',
            'alamat' => 'required|min:1',
            'no_telepon' => 'required|min:1',
            'kebutuhan_khusus' =>  'required|min:1',
            'disibilitas' => 'required|min:3',
            'nama_ayah' => 'required|min:1',
            'nama_ibu' => 'required|min:1',
            'nama_wali' => 'required|min:1',
        ]);

        $id = $request->id;
        $siswa = Siswa::find($id);

        if (!$id) {
           return redirect('backend/siswa')->with([
                'message' => "Data not found",
                'style' => 'danger'
            ]);
        }else{
            $siswa->nama_lengkap = $request->nama_lengkap;
            $siswa->nisn = $request->nisn;
            $siswa->nik = $request->nik;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->kelas_id = $request->kelas_id;
            $siswa->status = $request->status;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->alamat = $request->alamat;
            $siswa->no_telepon = $request->no_telepon;
            $siswa->kebutuhan_khusus = $request->kebutuhan_khusus;
            $siswa->disibilitas = $request->disibilitas;
            $siswa->nama_ayah = $request->nama_ayah;
            $siswa->nama_ibu = $request->nama_ibu;
            $siswa->nama_wali = $request->nama_wali;
            $siswa->save();
        }

        if ($siswa) {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap berhasil diubah",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap gagal diubah",
                'style' => 'danger'
            ]);
        }
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
       if ($siswa) {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap berhasil dihapus",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/siswa')->with([
                'message' => "Data $siswa->nama_lengkap gagal dihapus",
                'style' => 'danger'
            ]);
       }
    }
}
