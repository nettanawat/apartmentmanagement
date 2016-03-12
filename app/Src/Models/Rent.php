<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rents';
    public function customer(){
        return $this->hasMany('App\Src\Models\Customer');
    }

    public function room(){
        return $this->hasMany('App\Src\Models\Room');
    }
}
