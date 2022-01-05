<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    protected $table = 'jadwal_siswas';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
