<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'city_name' => 'Beni'
        ]);

        City::create([
            'city_name' => 'Chuquisaca'
        ]);

        City::create([
            'city_name' => 'Cochabamba'
        ]);

        City::create([
            'city_name' => 'La Paz'
        ]);
        
        City::create([
            'city_name' => 'Oruro'
        ]);

        City::create([
            'city_name' => 'Pando'
        ]);

        City::create([
            'city_name' => 'Posotí'
        ]);

        City::create([
            'city_name' => 'Santa Cruz'
        ]);

        City::create([
            'city_name' => 'Tarija',
        ]);
    }
}
