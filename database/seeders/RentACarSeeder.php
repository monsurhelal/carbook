<?php

namespace Database\Seeders;

use App\Models\RentACar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentACarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RentACar::Create([
            'car_id' => 1,
            'user_id' => 2,
            'pick_up_location' =>'dhaka rampura',
            'drop_off_location' => 'bogura',
            'pick_up_date' => '2025-11-12',
            'drop_off_date' => '2025-11-15',
            'pick_up_time' => '10:00',
            'payment' => '500',
            'payment_status' => 1,
            'status' => 1
        ]);
    }
}
