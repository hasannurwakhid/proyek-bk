<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    /** @use HasFactory<\Database\Factories\DokterFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function jadwalPeriksa(){
        return $this->hasMany(JadwalPeriksa::class,'id_dokter','id');
    }
    public function poli(){
        return $this->belongsTo(Poli::class,'id_poli','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
