<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
   protected $guarded = ['id'];

   public function car(){
    return $this->belongsTo(Car::class);
   }
}
