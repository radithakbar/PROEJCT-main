<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingIndividu extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_bk_id',
        'nama_siswa',
        'kelas',
        'jurusan',
        'tanggal',
        'deskripsi',
    ];

    public function guruBk()
    {
        return $this->belongsTo(GuruBK::class);
    }
}
