<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider_wallet_transactions extends Model
{
    use HasFactory;
    protected $table = 'rider_wallet_transactions';
    protected $fillable = [
        'amount',
        'type',
        'status',
    ];
    

}
