<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $featuresId = Feature::select('id')->get();
        Car::updateOrCreate([
            'image' =>'1.jpg',
            'car_name' =>'Mercedes Grand Sedan',
            'car_description' =>'Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic life One day however a small line of blind text by the name of Lorem 
                                    Ipsum decided to leave for the far World of Grammar.',
            'car_mileage' =>'40,000',
            'car_transmission' =>'Manual',
            'car_seats' =>'5 Adults',
            'car_luggage' =>'4 Bags',
            'car_fuel' =>'Petrol',
        ])->features()->sync($featuresId->pluck('id'));

    }
}
