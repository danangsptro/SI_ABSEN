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

    public static function queryTable($jadwal_id, $pertemuan)
    {
        $datas =  dataAbsen::select('data_absens.id as id', 'jadwal_siswa_id')
            ->join('jadwal_siswas', 'jadwal_siswas.id', '=', 'data_absens.jadwal_siswa_id')->where('jadwal_siswas.jadwal_id', $jadwal_id)
            ->where('data_absens.pertemuan', $pertemuan)->get();

        return $datas;
    }
}
