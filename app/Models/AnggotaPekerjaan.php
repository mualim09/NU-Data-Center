<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'anggota_pekerjaan';

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'anggota_pekerjaan_id', 'id')
    }
}
