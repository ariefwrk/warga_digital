<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'nomor_rumah',
        'status_rumah',
        'nomor_telepon',
        'status_keanggotaan',
    ];
}
