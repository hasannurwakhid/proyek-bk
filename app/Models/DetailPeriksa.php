<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPeriksa extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPeriksaFactory> */
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function obat(){
        return $this->belongsTo(Obat::class,'id_obat','id');
    }
    public function periksa(){
        return $this->belongsTo(Periksa::class,'id_periksa','id');
    }
}
