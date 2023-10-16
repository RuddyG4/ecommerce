<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ruddy Gonzalo Quispe Huanca',
            'email' => 'ruddygonzqh@gmail.com',
            'role_id' => 1,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        Customer::create([
            'first_name' => 'Ruddy Gonzalo',
            'last_name' => 'Quispe Huanca',
            'phone' => '70867003',
            'city_id' => 8,
            'user_id' => $user->id,
        ]);
    }
}
