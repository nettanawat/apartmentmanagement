<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    public function customer(){
        return $this->belongsTo('App\Src\Models\Customer', 'customer_id');
    }
}
