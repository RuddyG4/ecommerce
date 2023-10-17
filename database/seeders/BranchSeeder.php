<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'branch_name' => 'Tienda principal SC',
            'address' => 'Av. Virgen de Luján',
            'city_id' => 8
        ]);
        
        Branch::create([
            'branch_name' => 'Tienda principal LP',
            'address' => 'Las cejas',
            'city_id' => 4
        ]);
        
        Branch::create([
            'branch_name' => 'Sucursal comercial cañoto SC',
            'address' => 'Av. Cañoto 1er anillo.',
            'city_id' => 8
        ]);
    }
}
