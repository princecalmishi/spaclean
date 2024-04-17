<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider_referees extends Model
{
    use HasFactory;
    protected $table = 'rider_referees';

    protected $fillable = [
        'name',
        'phone',
        'national_id',
    ];

}
