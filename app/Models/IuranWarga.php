<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IuranWarga extends Model
{
    protected $fillable = ['penduduk_id', 'bulan', 'jumlah', 'tanggal_pembayaran'];

    // Relasi: Setiap iuran dimiliki oleh 1 penduduk
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
