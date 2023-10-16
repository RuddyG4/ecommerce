<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'vendor_name' => 'Female importaciones'
        ]);
        
        Vendor::create([
            'vendor_name' => 'Azzorti'
        ]);
        
        Vendor::create([
            'vendor_name' => 'Adriana imports'
        ]);
        
        Vendor::create([
            'vendor_name' => 'Levis'
        ]);
    }
}
