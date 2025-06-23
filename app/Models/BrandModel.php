<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
