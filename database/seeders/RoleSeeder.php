<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrador',
            'description' => 'Rol de administrador del ecommerce.',
        ]);
        
        Role::create([
            'name' => 'Cliente',
            'description' => 'Rol de cliente/usuario.',
        ]);
    }
}
