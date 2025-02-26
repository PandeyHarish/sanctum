<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            ['customer_id' => 1, 'total' => 1250, 'status' => 'pending'],
            ['customer_id' => 2, 'total' => 900, 'status' => 'processing'],
            ['customer_id' => 3, 'total' => 350, 'status' => 'completed'],
            ['customer_id' => 4, 'total' => 75, 'status' => 'pending'],
            ['customer_id' => 5, 'total' => 1100, 'status' => 'processing'],
            ['customer_id' => 6, 'total' => 1500, 'status' => 'completed'],
            ['customer_id' => 7, 'total' => 500, 'status' => 'pending'],
            ['customer_id' => 8, 'total' => 1300, 'status' => 'processing'],
            ['customer_id' => 9, 'total' => 600, 'status' => 'completed'],
            ['customer_id' => 10, 'total' => 450, 'status' => 'pending'],
        ];

        Order::insert($orders);

        // Attach products to orders
        $products = Product::all();
        Order::all()->each(function ($order) use ($products) {
            $order->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray(),
                ['quantity' => rand(1, 5), 'price' => rand(100, 1000)]
            );
        });
    }
}
