<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public function roomType(){
        return $this->belongsTo('App\RoomType','room_type_id');
    }
}
