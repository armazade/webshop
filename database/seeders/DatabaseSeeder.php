<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $products = Product::factory(5)->create();

        $product = $products->random();

        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => 0, // will be updated later
        ]);

        $quantity = 2;
        $orderItem = OrderItem::factory()->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
        ]);

        $order->update([
            'total_price' => $orderItem->price * $orderItem->quantity,
        ]);
    }
}
