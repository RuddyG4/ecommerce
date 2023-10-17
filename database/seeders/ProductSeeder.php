<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Blusa de manga larga Azzorti',
            'description' => 'Blusa de manga larga Azzorti de color azul y blanco',
            'state' => 0,
            'weight' => 0.3,
            'brand_id' => 2,
            'product_type_id' => 1,
            'vendor_id' => 2,
            'category_id' => 2,
        ]);

        Product::create([
            'product_name' => 'Tenis adidas',
            'description' => 'Tenis adidas de color blanco y negro.',
            'state' => 0,
            'weight' => 0.6,
            'brand_id' => 9,
            'product_type_id' => 14,
            'vendor_id' => 1,
            'category_id' => 1,
        ]);
        
        Product::create([
            'product_name' => 'Tenis adidas 2023',
            'description' => 'Tenis adidas edición 2023 color negro con puntos blancos',
            'state' => 0,
            'weight' => 0.65,
            'brand_id' => 9,
            'product_type_id' => 14,
            'vendor_id' => 1,
            'category_id' => 1,
        ]);

        Product::create([
            'product_name' => 'Jean Levi\'s',
            'description' => 'Pantalón Jean Levi\'s de color azul',
            'state' => 0,
            'weight' => 0.4,
            'brand_id' => 1,
            'product_type_id' => 4,
            'vendor_id' => 4,
            'category_id' => 3,
        ]);
    }
}
