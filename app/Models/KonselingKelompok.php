<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingKelompok extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_bk_id',
        'nama_kelompok',
        'kelas',
        'jurusan',
        'anggota_kelompok',
        'tanggal',
    ];

    protected $casts = [
        'anggota_kelompok' => 'array',
    ];

    public function guruBk()
    {
        return $this->belongsTo(GuruBK::class);
    }
}
