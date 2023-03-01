<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone_number',
        'arrival_time',
        'check_out',
        'room_type'
    ];
}
