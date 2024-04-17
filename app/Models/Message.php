<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'incoming_msg_id',
        'Name',
        'unique_id'
    ];

    protected $table = 'messages';

}
