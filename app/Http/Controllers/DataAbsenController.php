<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;

// Models
use App\Http\Model\Jadwal;
use App\Http\Model\dataAbsen;

class DataAbsenController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();

        return view('backend.dataAbsen.index', compact('jadwals'));
    }

    public function api(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $pertemuan = $request->pertemuan;

        $datas = dataAbsen::queryTable($jadwal_id, $pertemuan);

        return Datatables::of($datas)
            ->addColumn('siswa', function ($d) {
                return $d->jadwalSiswa->siswa->nama_lengkap;
            })
            ->addColumn('kelas', function ($d) {
                return $d->jadwalSiswa->siswa->rombel->kelas;
            })
            ->addColumn('status', function ($d) {
                if ($d->alfa == 1) {
                    return 'Alfa';
                }
                if ($d->sakit == 1) {
                    return 'Sakit';
                }
                if ($d->izin == 1) {
                    return 'Izin';
                }
                if ($d->terlambat == 1) {
                    return 'Terlambat';
                }
                if ($d->alfa == null && $d->sakit == null && $d->izin == null && $d->terlambat == null) {
                    return 'Ada';
                }
            })
            ->addColumn('action', function ($d) {
                return "<a href='" . route('dataAbsen.edit', $d->id) . "' class='text-primary mr-2'><i class='fa fa-pencil'></i></a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function edit($id)
    {
        $data = dataAbsen::find($id);

        return view('backend.dataAbsen.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required'
        ]);

        $type = $request->type;
        $data = dataAbsen::find($id);

        switch ($type) {
            case 1:
                $data->update([
                    'alfa' => null,
                    'sakit' => null,
                    'izin' => null,
                    'terlambat' => null
                ]);
                break;
            case 2:
                $data->update([
                    'alfa' => 1,
                    'sakit' => null,
                    'izin' => null,
                    'terlambat' => null
                ]);
                break;
            case 3:
                $data->update([
                    'alfa' => null,
                    'sakit' => 1,
                    'izin' => null,
                    'terlambat' => null
                ]);
                break;
            case 4:
                $data->update([
                    'alfa' => null,
                    'sakit' => null,
                    'izin' => 1,
                    'terlambat' => null
                ]);
                break;
            case 5:
                $data->update([
                    'alfa' => null,
                    'sakit' => null,
                    'izin' => null,
                    'terlambat' => 5
                ]);
                break;
            default:
                $data->update([
                    'alfa' => null,
                    'sakit' => null,
                    'izin' => null,
                    'terlambat' => null
                ]);
                break;
        }

        return redirect()->route('dataAbsen.edit', $id)->with([
            'message' => "Berhasil memperbaharui data",
            'style'   => 'success'
        ]);
    }
}
