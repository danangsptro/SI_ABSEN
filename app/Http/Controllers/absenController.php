<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Http\Model\Jadwal;
use App\Http\Model\dataAbsen;
use App\Http\Model\JadwalSiswa;

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
        $jadwal = Jadwal::find($id);
        $siswas = JadwalSiswa::where('jadwal_id', $id)->get();

        return view('backend.absenSiswa.show', compact('jadwal'));
    }

    public function api(Request $request)
    {
        $jadwal_id = $request->jadwal_id;

        $datas = JadwalSiswa::where('jadwal_id', $jadwal_id)->get();

        return Datatables::of($datas)
            ->editColumn('siswa_id', function ($d) {
                return $d->siswa->nama_lengkap;
            })
            ->addColumn('kelas', function ($d) {
                return $d->siswa->rombel->kelas;
            })
            ->addColumn('action', function ($d) {
                $time = Carbon::now();
                $today = $time->format('Y-m-d');

                $check = dataAbsen::where('jadwal_siswa_id', $d->id)->where('tanggal_absen', $today)->first();

                if ($check) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $check->created_at)->format('d M Y | H:i:s');
                } else {
                    return "<a href='#' onclick='absen(" . $d->id . ", 1)' class='btn btn-sm btn-success'><i class='fa fa-check mr-1'></i>Absen</a>
                            <a href='#' onclick='absen(" . $d->id . ", 2)' class='btn btn-sm btn-danger'><i class='fa fa-check mr-1'></i>Alfa</a>
                            <a href='#' onclick='absen(" . $d->id . ", 3)' class='btn btn-sm btn-warning'><i class='fa fa-check mr-1'></i>Sakit</a>
                            <a href='#' onclick='absen(" . $d->id . ", 4)' class='btn btn-sm btn-primary'><i class='fa fa-check mr-1'></i>Izin</a>
                            <a href='#' onclick='absen(" . $d->id . ", 5)' class='btn btn-sm btn-secondary'><i class='fa fa-check mr-1'></i>Terlambat</a>";
                }
            })
            ->addIndexColumn(['action'])
            ->toJson();
    }

    public function absen(Request $request, $id)
    {
        $type = $request->type;
        $time = Carbon::now();
        $today = $time->format('Y-m-d');

        $checkPertemuan = dataAbsen::where('jadwal_siswa_id', $id)->count();

        $absen = new dataAbsen();
        $absen->jadwal_siswa_id = $id;
        $absen->pertemuan = $checkPertemuan + 1;
        switch ($type) {
            case 1:
                $type = 'ada';
                break;
            case 2:
                $absen->alfa = 1;
                break;
            case 3:
                $absen->sakit = 1;
                break;
            case 4:
                $absen->izin = 1;
                break;
            case 5:
                $absen->terlambat = 1;
                break;
            default:
                $type = null;
                break;
        }
        $absen->tanggal_absen = $today;
        $absen->save();

        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}
