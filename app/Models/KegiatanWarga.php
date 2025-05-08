<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanWarga extends Model
{
    use HasFactory;

    protected $table = 'kegiatanwargas';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'tanggal',
        'lokasi',
    ];

    public function createKegiatan(array $data)
    {
        return self::create($data);
    }

    public function readKegiatan($id)
    {
        return self::find($id);
    }

    public function updateKegiatan($id, array $data)
    {
        $kegiatan = self::find($id);
        if ($kegiatan) {
            $kegiatan->update($data);
            return $kegiatan;
        }
        return null;
    }

    public function deleteKegiatan($id)
    {
        $kegiatan = self::find($id);
        if ($kegiatan) {
            $kegiatan->delete();
            return true;
        }
        return false;
    }
}
