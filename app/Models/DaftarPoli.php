<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarPoli extends Model
{
    /** @use HasFactory<\Database\Factories\DaftarPoliFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function periksa(){
        return $this->hasOne(Periksa::class,'id_daftar_poli','id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class,'id_pasien','id');
    }
    public function jadwalPeriksa(){
        return $this->belongsTo(JadwalPeriksa::class,'id_jadwal','id');
    }
}
