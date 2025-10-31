<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
   protected $guarded = ['id'];
   protected $table = 'drivers';

   public function rentACar(){
      return $this->hasOne(RentACar::class);
   }

   public function car(){
      return $this->hasManyThrough(Car::class,RentACar::class,'driver_id','id','id','car_id');
   }

}
