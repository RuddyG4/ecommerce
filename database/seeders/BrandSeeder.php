<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'brand_name' => 'Levi\'s',
        ]);

        Brand::create([
            'brand_name' => 'Azzorti',
        ]);

        Brand::create([
            'brand_name' => 'Victoria\'s Secret',
        ]);
        
        Brand::create([
            'brand_name' => 'Nike Women',
        ]);
        
        Brand::create([
            'brand_name' => 'H&M Diva',
        ]);
        
        Brand::create([
            'brand_name' => 'Zara Femme',
        ]);
        
        Brand::create([
            'brand_name' => 'Chanel Couture',
        ]);
        
        Brand::create([
            'brand_name' => 'Forever 21 Chic',
        ]);
        
        Brand::create([
            'brand_name' => 'Adidas Glam',
        ]);
        
        Brand::create([
            'brand_name' => 'Gucci',
        ]);
        
        Brand::create([
            'brand_name' => 'Prada',
        ]);
        
        Brand::create([
            'brand_name' => 'Lululemon Luxe',
        ]);
        
        Brand::create([
            'brand_name' => 'Kate Spade Chic',
        ]);
        
        Brand::create([
            'brand_name' => 'Dior Diva',
        ]);
        
    }
}
