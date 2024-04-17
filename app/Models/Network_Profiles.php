<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network_Profiles extends Model
{
    protected $fillable = [
        'user_id',
        'Name',
        'unique_id'
    ];
    use HasFactory;

    protected $table = 'network_profiles';

}
