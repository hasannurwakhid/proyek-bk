<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPeriksa extends Model
{
    /** @use HasFactory<\Database\Factories\JadwalPeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function daftarPoli(){
        return $this->hasMany(DaftarPoli::class,'id_jadwal','id');
    }
    public function dokter(){
        return $this->belongsTo(Dokter::class,'id_dokter','id');
    }
}
