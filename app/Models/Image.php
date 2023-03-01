<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'photo_name',
        'room_id'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }
}
