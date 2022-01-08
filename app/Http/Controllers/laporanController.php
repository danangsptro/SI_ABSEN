<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;

// Models
use App\Http\Model\Jadwal;
use App\Http\Model\dataAbsen;

class laporanController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();

        return view('backend.laporan.index', compact('jadwals'));
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
                return '-';
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function exportPDF(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $pertemuan = $request->pertemuan;

        $datas = dataAbsen::queryTable($jadwal_id, $pertemuan);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('backend.laporan.detailLaporan', compact('datas'));

        return $pdf->stream("Laporan.pdf");
    }
}
