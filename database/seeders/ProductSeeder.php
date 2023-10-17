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
            'image_path' => 'uploads/Oy2ue9atSfe4yD9xoqzR6HFBVKZlEsRqh0sW310j.png',
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
            'image_path' => 'uploads/VCR7bVeMCLCEvRJDSJMbWMSclgrREQsXdtFduf3L.avif',
            'state' => 0,
            'weight' => 0.6,
            'brand_id' => 9,
            'product_type_id' => 14,
            'vendor_id' => 1,
            'category_id' => 1,
        ]);
        
        Product::create([
            'product_name' => 'Tenis adidas femenino 2023',
            'description' => 'Tenis adidas edición 2023 color negro con puntos blancos',
            'image_path' => 'uploads/CKUXoL4Ezu2MMxsyY0XcGXRztEw7t6Vi5iPSxBxF.avif',
            'state' => 0,
            'weight' => 0.65,
            'brand_id' => 9,
            'product_type_id' => 14,
            'vendor_id' => 1,
            'category_id' => 1,
        ]);

        Product::create([
            'product_name' => 'Jean femenino Levi\'s',
            'description' => 'Pantalón Jean Levi\'s de color azul',
            'image_path' => 'uploads/mUZW51s42WCSckupXn0AW38OSBxKr8mN0Cxixght.jpg',
            'state' => 0,
            'weight' => 0.4,
            'brand_id' => 1,
            'product_type_id' => 4,
            'vendor_id' => 4,
            'category_id' => 3,
        ]);
        
        Product::create([
            'product_name' => 'Camisa azul femenina',
            'description' => 'Camisa azul femenina',
            'image_path' => 'uploads/2c4SE5HqW3tyFJWwip6AUZie8X8Y8N3lfugIeT6d.jpg',
            'state' => 0,
            'weight' => 0.4,
            'brand_id' => 1,
            'product_type_id' => 4,
            'vendor_id' => 4,
            'category_id' => 3,
        ]);
        
        Product::create([
            'product_name' => 'Camisa azul gucci',
            'description' => 'Camisa azul',
            'image_path' => 'uploads/H0swnuRo2tNcZI1C9sgfFYPugGBYWtvY87I2KRJ5.jpg',
            'state' => 0,
            'weight' => 0.4,
            'brand_id' => 1,
            'product_type_id' => 4,
            'vendor_id' => 4,
            'category_id' => 3,
        ]);
    }
}
