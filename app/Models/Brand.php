<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    public function brandModels(): HasMany
    {
        return $this->hasMany(BrandModel::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
