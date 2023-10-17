<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::created([
            'discount_name' => 'Descuento de primavera',
            'discount_description' => 'Descuento del 10% por la estación primaveral.',
            'discount_type' => 1,
            'value' => 0.10,
            'allowed_uses' => 100,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'is_active' => 0,
        ]);
        
        Discount::created([
            'discount_name' => 'Descuento navideño',
            'discount_description' => 'Descuento del 25% por fiestas navideñas.',
            'discount_type' => 1,
            'value' => 0.25,
            'allowed_uses' => 200,
            'start_date' => now()->addMonths(2),
            'end_date' => now()->addMonths(2)->addDays(30),
            'is_active' => 1,
        ]);
    }
}
