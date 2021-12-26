<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class mataPelajaran extends Model
{
    protected $guarded = [];

    public function dataAbsen()
    {
        return $this->hasMany(dataAbsen::class, 'pelajaran_id', 'id');
    }
}
