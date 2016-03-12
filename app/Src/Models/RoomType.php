<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
    public function room(){
        return $this->belongsToMany('App\Src\Models\Room');
    }
}
