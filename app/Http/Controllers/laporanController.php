<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;

use Illuminate\Http\Request;

// Models
use App\Http\Model\Jadwal;
use App\Http\Model\dataAbsen;
use App\Http\Model\Rombel;

class laporanController extends Controller
{
    public function index()
    {
        $role = Auth::user()->user_role;

        if ($role == 'guru') {
            $jadwals = Jadwal::where('guru_id', Auth::user()->id)->get();
        } else {
            $jadwals = Jadwal::all();
        }


        $kelas   = Rombel::select('id', 'kelas')->get();

        return view('backend.laporan.index', compact(
            'jadwals',
            'kelas'
        ));
    }

    public function api(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $kelas_id  = $request->kelas_id;
        $pertemuan = $request->pertemuan;

        $datas = dataAbsen::queryTable($jadwal_id, $pertemuan, $kelas_id);

        return Datatables::of($datas)
            ->addColumn('siswa', function ($d) {
                return $d->jadwalSiswa->siswa->nama_lengkap;
            })
            ->addColumn('kelas', function ($d) {
                return $d->jadwalSiswa->siswa->rombel->kelas;
            })
            ->addColumn('status', function ($d) {
                if ($d->alfa != null) {
                    return 'Alfa';
                }
                if ($d->sakit != null) {
                    return 'Sakit';
                }
                if ($d->izin != null) {
                    return 'Izin';
                }
                if ($d->terlambat != null) {
                    return 'Terlambat';
                }
                if ($d->alfa == null && $d->sakit == null && $d->izin == null && $d->terlambat == null) {
                    return 'Ada';
                }
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function exportPDF(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $pertemuan = $request->pertemuan;
        $kelas_id  = $request->kelas_id;

        $datas = dataAbsen::queryTable($jadwal_id, $pertemuan, $kelas_id);
        $jadwal = Jadwal::find($jadwal_id);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('backend.laporan.detailLaporan', compact(
            'datas',
            'jadwal'
        ));

        return $pdf->stream("Laporan.pdf");
    }
}
