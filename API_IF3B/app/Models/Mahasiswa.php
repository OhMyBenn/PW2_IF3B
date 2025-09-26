<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['kode', 'Nama', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id'); // 1 ke 1
    }

    public function Fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id'); // 1 kw 1
    }
}