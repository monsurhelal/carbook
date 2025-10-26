<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentACar extends Model
{
    protected $guarded = ['id'];

    public function car() {
        return $this->belongsTo(Car::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

}
