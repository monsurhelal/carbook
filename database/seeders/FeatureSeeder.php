<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'Airconditions',
            'Seat Belt',
            'Audio input',
            'GPS',
            'Water',
            'Remote central locking',
            'Music',
            'Climate control',
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate([
                'car_id' => 1,
                'feature' => $feature,
            ]);
        }

    }
}
