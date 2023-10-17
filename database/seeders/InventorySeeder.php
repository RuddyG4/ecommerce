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
            'product_id' => 2,
            'branch_id' => 2,
            'stock' => 10,
            'sale_price' => 90,
            'purchase_price' => 60,
        ]);
        
        Inventory::create([
            'product_id' => 3,
            'branch_id' => 2,
            'stock' => 20,
            'sale_price' => 95,
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
            'sale_price' => 105,
            'purchase_price' => 80,
        ]);
    }
}
