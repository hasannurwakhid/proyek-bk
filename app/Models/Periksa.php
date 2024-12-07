<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periksa extends Model
{
    /** @use HasFactory<\Database\Factories\PeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function detailPeriksa(){
        return $this->hasMany(DetailPeriksa::class,'id_periksa','id');
    }

    public function daftarPoli(){
        return $this->belongsTo(DaftarPoli::class,'id_daftar_poli','id');
    }
}
