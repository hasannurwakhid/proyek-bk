<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsultasi extends Model
{
    /** @use HasFactory<\Database\Factories\DaftarPoliFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function dokter(){
        return $this->belongsTo(Dokter::class,'id_dokter','id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class,'id_pasien','id');
    }
}
