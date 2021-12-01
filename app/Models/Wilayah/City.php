<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = "city_id";
    protected $fillable = [];

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id', 'city_id');
    }
}
