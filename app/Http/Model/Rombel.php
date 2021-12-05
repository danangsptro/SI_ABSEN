<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $guarded = [];

    public function siswa ()
    {
        return $this->hasMany(Siswa::class, 'rombel_id', 'id');
    }
}
