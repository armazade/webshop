<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
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
            'user_id' => User::factory(), // automatically create a related user
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'ordered_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['pending', 'paid', 'shipped', 'delivered', 'canceled']),
        ];
    }
}
