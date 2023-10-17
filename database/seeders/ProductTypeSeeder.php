<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'name' => 'Blusa',
        ]);
        
        ProductType::create([
            'name' => 'Falda',
        ]);
        
        ProductType::create([
            'name' => 'Vestido',
        ]);
        
        ProductType::create([
            'name' => 'Pantalón',
        ]);
        
        ProductType::create([
            'name' => 'Short',
        ]);
        
        ProductType::create([
            'name' => 'Chaqueta',
        ]);
        
        ProductType::create([
            'name' => 'Sweater',
        ]);
        
        ProductType::create([
            'name' => 'Camiseta',
        ]);
        
        ProductType::create([
            'name' => 'Ropa interior',
        ]);
        
        ProductType::create([
            'name' => 'Pijama',
        ]);
        
        ProductType::create([
            'name' => 'Traje de baño',
        ]);
        
        ProductType::create([
            'name' => 'Abrigo',
        ]);
        
        ProductType::create([
            'name' => 'Lenceria',
        ]);
        
        ProductType::create([
            'name' => 'Calzado',
        ]);
        
    }
}
