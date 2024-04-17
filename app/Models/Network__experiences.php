<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network__experiences extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'work_position',
        'Company',
        'fromdate',
        'todate',
        'location',
        'description',
        'skills',
        'education',
        
    ];

    protected $table = 'network__experiences';

}
