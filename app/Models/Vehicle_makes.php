<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_makes extends Model
{
    use HasFactory;

    protected $table = 'vehicle_makes';

    public function models()
    {
        return $this->hasMany(Vehicle_models::class);
    }

}
