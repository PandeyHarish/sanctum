<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Laptop', 'price' => 1200, 'stock' => 10],
            ['name' => 'Smartphone', 'price' => 800, 'stock' => 20],
            ['name' => 'Headphones', 'price' => 150, 'stock' => 30],
            ['name' => 'Keyboard', 'price' => 50, 'stock' => 40],
            ['name' => 'Mouse', 'price' => 30, 'stock' => 50],
            ['name' => 'Monitor', 'price' => 300, 'stock' => 15],
            ['name' => 'Tablet', 'price' => 500, 'stock' => 25],
            ['name' => 'Smartwatch', 'price' => 250, 'stock' => 35],
            ['name' => 'Printer', 'price' => 200, 'stock' => 10],
            ['name' => 'Speaker', 'price' => 100, 'stock' => 20],
        ];

        Product::insert($products);
    }
}
