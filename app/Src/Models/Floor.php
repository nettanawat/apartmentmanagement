<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    public function room(){
        return $this->belongsToMany('App\Src\Models\Room');
    }
}
