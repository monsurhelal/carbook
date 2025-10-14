<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    // relation with features

    public function features() {
        return $this->belongsToMany(Feature::class);
    }

    public function price() {
        return $this->hasOne(Price::class);
    }

    public function rentacar() {
        return $this->hasMany(RentACar::class);
    }
}
