<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public function address(){
        return $this->hasOne('App\Src\Models\Address');
    }

    public function rent(){
        return $this->belongsToMany('App\Src\Models\Rent', 'customer_id');
    }
}
