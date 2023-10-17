<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingMethod::create([
            'method_name' => 'Envios gratis',
            'method_description' => 'Envíos gratis con algunas restricciones.',
            'price_per_kg' => 0,
            'price_per_km' => 0
        ]);
        
        ShippingMethod::create([
            'method_name' => 'Pedidos ya',
            'method_description' => 'Envíos a través de pedidos ya.',
            'price_per_kg' => 5,
            'price_per_km' => 5
        ]);
    }
}
