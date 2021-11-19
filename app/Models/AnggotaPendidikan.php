<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPendidikan extends Model
{
    use HasFactory;

    protected $table = 'anggota_pendidikan';
    protected $guarded = ['id'];


    public function pondok()
    {
        return $this->belongsTo(Pondok::class, 'pondok_id', 'id');
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'anggota_pendidikan_id', 'id');
    }
}
