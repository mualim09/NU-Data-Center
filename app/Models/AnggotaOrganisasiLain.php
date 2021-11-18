<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaOrganisasiLain extends Model
{
    use HasFactory;

    protected $table = 'anggota_organisasi_lain';
    protected $guarded = ['id'];


    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }
}
