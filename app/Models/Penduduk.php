<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'alamat'];

    // Tambahkan method ini di dalam class Penduduk
public function iuran()
{
    return $this->hasMany(IuranWarga::class);
}
}


