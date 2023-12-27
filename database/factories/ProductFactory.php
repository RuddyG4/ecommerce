<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(),
            'description' => $this->faker->text(100),
            'image_path' => 'uploads/Oy2ue9atSfe4yD9xoqzR6HFBVKZlEsRqh0sW310j.png',
            'state' => 0,
            'weight' => 0.3,
            'brand_id' => 2,
            'product_type_id' => 1,
            'vendor_id' => 2,
            'category_id' => 2,
        ];
    }
}
