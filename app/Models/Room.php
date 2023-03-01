<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'type',
        'main_photo',
        'details',
        'count',
        'price'
    ];
    public function images()
    {
        return $this->hasMany(Image::class,'room_id','id');
    }
}
