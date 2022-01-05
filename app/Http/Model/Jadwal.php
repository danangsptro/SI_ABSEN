<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

// Models
use App\User;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $guarded = [];

    public function pelajaran()
    {
        return $this->belongsTo(mataPelajaran::class, 'pelajaran_id');
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
