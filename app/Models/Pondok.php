<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pondok extends Model
{
    use HasFactory;

    protected $table = 'pondok';
    protected $guard = ['id'];


    public function anggotaPendidikan()
    {
        return $this->hasMany(AnggotaPendidikan::class, 'pondok_id', 'id');
    }
}
