<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barzars extends Model
{
    use HasFactory;
    
    protected $table = 'barzars';

    protected $fillable = [
        '_token',
       
    ];

}
