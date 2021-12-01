<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $primaryKey = "city_id";
    protected $fillable = [];

    public function district()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }
}
