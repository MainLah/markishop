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
            ],
            [
                'name' => 'Product 4',
                'description' => 'Ini adalah produk 4',
                'price' => 29.99,
                'is_available' => true,
            ],
            [
                'name' => 'Product 5',
                'description' => 'Ini adalah produk 5',
                'price' => 5.25,
                'is_available' => true,
            ],
            [
                'name' => 'Product 6',
                'description' => 'Ini adalah produk 6',
                'price' => 1.99,
                'is_available' => true,
            ],
            [
                'name' => 'Product 7',
                'description' => 'Ini adalah produk 7',
                'price' => 99.99,
                'is_available' => true,
            ],
            [
                'name' => 'Product 8',
                'description' => 'Ini adalah produk 8',
                'price' => 79.99,
                'is_available' => false,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
