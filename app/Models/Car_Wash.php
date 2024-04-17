<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Wash extends Model
{
    use HasFactory;

    protected $table = 'car_wash';

    public function personnel()
    {
        return $this->hasMany(Car_Wash_Personnel::class);
    }

}
