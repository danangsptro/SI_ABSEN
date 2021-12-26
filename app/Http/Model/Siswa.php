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
}
