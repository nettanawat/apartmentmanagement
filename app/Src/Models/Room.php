<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public function roomType(){
        return $this->belongsTo('App\Src\Models\RoomType','room_type_id');
    }

    public function floor(){
        return $this->belongsTo('App\Src\Models\Floor','floor_id');
    }

    public function rent(){
        return $this->belongsToMany('App\Src\Models\Rent','room_id');
    }
}
