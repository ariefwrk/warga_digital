<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiTransaksi extends Model
{
    protected $fillable = ['tanggal','deskripsi', 'kategori', 'dana_masuk', 'dana_keluar'];
}
