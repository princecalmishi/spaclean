<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_models extends Model
{
    use HasFactory;

    protected $table = 'vehicle_models';

    public function makes()
    {
        return $this->belongsTo(Vehicle_makes::class);
    }

    protected $casts = [
        'make' => 'string',
    ];
    

}

