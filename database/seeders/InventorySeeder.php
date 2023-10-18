<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::create([
            'product_id' => 1,
            'branch_id' => 1,
            'stock' => 10,
            'sale_price' => 100,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 2,
            'branch_id' => 1,
            'stock' => 20,
            'sale_price' => 110,
            'purchase_price' => 80,
        ]);

        Inventory::create([
            'product_id' => 3,
            'branch_id' => 1,
            'stock' => 10,
            'sale_price' => 120,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 4,
            'branch_id' => 1,
            'stock' => 20,
            'sale_price' => 130,
            'purchase_price' => 80,
        ]);

        Inventory::create([
            'product_id' => 5,
            'branch_id' => 1,
            'stock' => 10,
            'sale_price' => 140,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 6,
            'branch_id' => 1,
            'stock' => 20,
            'sale_price' => 150,
            'purchase_price' => 80,
        ]);
        
        Inventory::create([
            'product_id' => 1,
            'branch_id' => 2,
            'stock' => 10,
            'sale_price' => 200,
            'purchase_price' => 60,
        ]);

        Inventory::create([
            'product_id' => 2,
            'branch_id' => 2,
            'stock' => 10,
            'sale_price' => 210,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 3,
            'branch_id' => 2,
            'stock' => 20,
            'sale_price' => 220,
            'purchase_price' => 80,
        ]);
        
        Inventory::create([
            'product_id' => 4,
            'branch_id' => 2,
            'stock' => 105,
            'sale_price' => 230,
            'purchase_price' => 60,
        ]);

        Inventory::create([
            'product_id' => 5,
            'branch_id' => 2,
            'stock' => 10,
            'sale_price' => 240,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 6,
            'branch_id' => 2,
            'stock' => 25,
            'sale_price' => 250,
            'purchase_price' => 80,
        ]);
        
        Inventory::create([
            'product_id' => 3,
            'branch_id' => 3,
            'stock' => 10,
            'sale_price' => 99.99,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 4,
            'branch_id' => 3,
            'stock' => 20,
            'sale_price' => 105.5,
            'purchase_price' => 80,
        ]);
        
        Inventory::create([
            'product_id' => 5,
            'branch_id' => 3,
            'stock' => 10,
            'sale_price' => 115.99,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 6,
            'branch_id' => 3,
            'stock' => 20,
            'sale_price' => 125.25,
            'purchase_price' => 80,
        ]);
    }
}
