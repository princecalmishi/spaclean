<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Riders extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'national_id',
        'town',
        'plate_number',
        'color',
        'rare_image',
        'front_image',
        'good_conduct',
        'insurance',
        'license',
        'password',
        'status'




    ];

    protected $table = 'riders';

}
