<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bazaar_package extends Model
{
    use HasFactory;

    protected $table = 'bazaar_package';
    protected $fillable = ['name', 'amount', 'number_of_cars', 'period'];

}
