<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $banches = \App\Models\Branch::pluck('id')->toArray();
        $customers = \App\Models\Customer::all();
        $shippingMethods = \App\Models\ShippingMethod::all();
        $cities = \App\Models\City::all();
        $discounts = \App\Models\Discount::all();

        return [
            'branch_id' => $banches->random(),
            'customer_id' => $customers->random(),
            'shipping_method_id' => $shippingMethods->random(),
            'city_id' => $cities->random(),
            'order_date' => fake()->dateTimeBetween('now', '+1 week'),
            'shipping_address1' => fake()->streetAddress(),
            'shipping_address2' => fake()->streetAddress(),
            'order_instructions' => fake()->text(),
            'guest_email' => fake()->email(),
            'discount_id' => $discounts->random(),
        ];
    }
}
