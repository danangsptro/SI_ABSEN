<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'kelas_id', 'id');
    }

    public function dataAbsen()
    {
        return $this->hasMany(dataAbsen::class, 'kelas_id', 'id');
    }
}
