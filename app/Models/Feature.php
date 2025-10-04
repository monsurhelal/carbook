<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = ['id'];

    // relation with car 

    public function car(){
        return $this->belongsToMany(Car::class)->withPivot('car_id');
    }
}
