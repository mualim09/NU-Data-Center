<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $guard = ['id'];

    public function organisasiLain()
    {
        return $this->hasMany(AnggotaOrganisasiLain::class, 'anggota_id', 'id');
    }

    public function organisasiNu()
    {
        return $this->hasMany(AnggotaOrganisasiNu::class, 'anggota_id', 'id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(AnggotaPendidikan::class, 'anggota_pendidikan_id', 'id');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(AnggotaPekerjaan::class, 'anggota_pekerjaan_id', 'id');
    }
}
