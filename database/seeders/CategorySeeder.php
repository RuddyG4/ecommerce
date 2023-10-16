<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => 'Deportiva'
        ]);

        Category::create([
            'category_name' => 'Casual'
        ]);

        Category::create([
            'category_name' => 'Vintage'
        ]);

        Category::create([
            'category_name' => 'Romantica'
        ]);

        Category::create([
            'category_name' => 'Minimalista'
        ]);
    }
}
