<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Product 1',
            'sub_title' => 'Product 1 Subtitle',
            'description' => 'This is the description of Product 1.',
            'image' => 'product1.jpg',
            'card_image' => 'card_product1.jpg',
            'client' => 'Client 1',
            'status' => Status::Active, // Or use Status::Active depending on your setup
            'link' => 'https://example.com/product1',
        ]);

        Product::create([
            'title' => 'Product 2',
            'sub_title' => 'Product 2 Subtitle',
            'description' => 'This is the description of Product 2.',
            'image' => 'product2.jpg',
            'card_image' => 'card_product2.jpg',
            'client' => 'Client 2',
            'status' => Status::Active,
            'link' => 'https://example.com/product2',
        ]);
    }

}
