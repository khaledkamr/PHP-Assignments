<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'oppo',
            'desc' => 'latest version',
            'price' => 100,
            'image' => 'products/2.png',
            'quantity' => 5
        ]);
        Product::create([
            'name' => 'iPhone',
            'desc' => 'latest version',
            'price' => 200,
            'image' => 'products/1.png',
            'quantity' => 8
        ]);
        Product::create([
            'name' => 'samsung',
            'desc' => 'latest version',
            'price' => 150,
            'image' => 'products/3.png',
            'quantity' => 6
        ]);
    }
}
