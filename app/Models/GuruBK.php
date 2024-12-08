<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBK extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'email'];

    public function konselingIndividu()
    {
        return $this->hasMany(KonselingIndividu::class);
    }

    public function konselingKelompok()
    {
        return $this->hasMany(KonselingKelompok::class);
    }
}

