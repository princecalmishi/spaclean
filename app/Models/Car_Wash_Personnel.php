<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Wash_Personnel extends Model
{
    use HasFactory;

    protected $table = 'car_wash_personnel';

    public function carWash()
    {
        return $this->belongsTo(Car_Wash::class);
    }
}
