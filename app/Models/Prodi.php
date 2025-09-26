<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['nama', 'kode', 'fakultas_id'];
    
    public function fakultas(){
        return $this->belongsTo(Fakultas::class,'fakultas_id','id');// 1 ke n
    }
}
