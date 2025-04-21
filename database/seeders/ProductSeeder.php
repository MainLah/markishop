<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Ini adalah produk 1',
                'price' => 50.25,
                'is_available' => true,
            ],
            [
                'name' => 'Product 2',
                'description' => 'Ini adalah produk 2',
                'price' => 49.99,
                'is_available' => true,
            ],
            [
                'name' => 'Product 3',
                'description' => 'Ini adalah produk 3',
                'price' => 29.99,
                'is_available' => true,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
