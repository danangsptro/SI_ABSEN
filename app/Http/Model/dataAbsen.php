<?php

namespace App\Http\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class dataAbsen extends Model
{
    protected $guarded = [];

    public function jadwalSiswa()
    {
        return $this->belongsTo(JadwalSiswa::class, 'jadwal_siswa_id');
    }

    public static function queryTable($jadwal_id, $pertemuan, $kelas_id)
    {
        $datas =  dataAbsen::select('data_absens.id as id', 'jadwal_siswa_id', 'data_absens.created_at as created_at', 'alfa', 'sakit', 'izin', 'terlambat', 'pertemuan')
            ->join('jadwal_siswas', 'jadwal_siswas.id', '=', 'data_absens.jadwal_siswa_id')
            ->join('siswas', 'siswas.id', '=', 'jadwal_siswas.siswa_id')
            ->where('siswas.kelas_id', $kelas_id)
            ->where('jadwal_siswas.jadwal_id', $jadwal_id)
            ->where('pertemuan', $pertemuan)->get();

        return $datas;
    }
}
