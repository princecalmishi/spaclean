<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider_wallets extends Model
{
    use HasFactory;
    protected $table = 'rider_wallets';

    protected $fillable = [
        'balance',
        'rider_id',
        
    ];

}
