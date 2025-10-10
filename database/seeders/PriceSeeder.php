<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::updateOrCreate([
            'car_id' => '1',
            'hourly' => '5',
            'daily' => '50',
            'monthly' => '999',
            'fuel_charge' => '3',
        ]);
    }
}
