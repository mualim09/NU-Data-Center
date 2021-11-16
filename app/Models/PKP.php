<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKP extends Model
{
    use HasFactory;

    protected $table = 'pkp';

    public function anggota()
    {
        $this->hasMany(Anggota::class, 'pkp_id', 'id');
    }
}
