<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = ['nama', 'kode'];
    public function prodi(){
        return $this->hasMany(Prodi::class);// 1 to n
    }
}
