<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'street' => $this->faker->streetName(),
            'house_number' => $this->faker->buildingNumber(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'status' => $this->faker->randomElement(['pending', 'paid', 'shipped', 'delivered', 'canceled']),
        ];
    }
}
