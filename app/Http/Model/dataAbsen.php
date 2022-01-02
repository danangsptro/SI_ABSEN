<?php

namespace App\Http\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class dataAbsen extends Model
{
    protected $guarded = [];

    public function mataPelajaran ()
    {
        return $this->belongsTo(mataPelajaran::class, 'pelajaran_id', 'id');
    }

    public function siswa ()
    {
        return $this->belongsTo(Siswa::class, 'kelas_id', 'id');
    }

    public function guru ()
    {
        return $this->belongsTo(User::class, 'guru_id', 'id');
    }
}
