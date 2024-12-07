<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    /** @use HasFactory<\Database\Factories\PasienFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function daftarPoli(){
        return $this->hasMany(DaftarPoli::class,'id_pasien','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
